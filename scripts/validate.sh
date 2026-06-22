#!/usr/bin/env bash

set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME_DIR="${ROOT_DIR}/theme"
CONFIG_FILE="${ROOT_DIR}/wp-vibecoder.json"
FALLBACK_SCREENSHOT="${ROOT_DIR}/assets/wp-vibecoder-default-screenshot.png"
WARNINGS=0

fail() {
	echo "ERROR: $*" >&2
	exit 1
}

warn() {
	echo "WARNING: $*" >&2
	WARNINGS=$((WARNINGS + 1))
}

required_files=(
	"agent.md"
	"AGENTS.md"
	"CLAUDE.md"
	"wp-vibecoder.json"
	"theme/style.css"
	"theme/functions.php"
	"theme/page-home.php"
	"theme/page.php"
	"theme/single.php"
	"theme/index.php"
	"theme/header.php"
	"theme/footer.php"
	"assets/wp-vibecoder-default-screenshot.png"
)

for file in "${required_files[@]}"; do
	[[ -f "${ROOT_DIR}/${file}" ]] || fail "Missing required file: ${file}"
done

if [[ ! -f "${THEME_DIR}/screenshot.png" ]]; then
	warn "theme/screenshot.png is missing; restoring the default WP Vibecoder image."
	cp "${FALLBACK_SCREENSHOT}" "${THEME_DIR}/screenshot.png"
fi

for forbidden in "theme/front-page.php" "theme/home.php"; do
	[[ ! -e "${ROOT_DIR}/${forbidden}" ]] || fail "Forbidden V1 template found: ${forbidden}"
done

if command -v php >/dev/null 2>&1; then
	php -r '
		$file = $argv[1];
		$data = json_decode(file_get_contents($file), true);
		if (!is_array($data) || json_last_error() !== JSON_ERROR_NONE) {
			fwrite(STDERR, "Invalid wp-vibecoder.json\n");
			exit(1);
		}
	' "${CONFIG_FILE}"

	while IFS= read -r -d '' file; do
		php -l "${file}" >/dev/null || exit 1
	done < <(find "${THEME_DIR}" -type f -name '*.php' -print0)
else
	warn "PHP CLI is unavailable; PHP lint and PHP-based checks were skipped."
	if command -v node >/dev/null 2>&1; then
		node -e 'JSON.parse(require("fs").readFileSync(process.argv[1], "utf8"))' "${CONFIG_FILE}" ||
			fail "Invalid wp-vibecoder.json"
	elif command -v python3 >/dev/null 2>&1; then
		python3 -m json.tool "${CONFIG_FILE}" >/dev/null || fail "Invalid wp-vibecoder.json"
	else
		warn "Neither Node.js nor Python is available; JSON syntax validation was skipped."
	fi
fi

style_version="$(
	sed -n 's/^[[:space:]]*Version:[[:space:]]*//p' "${THEME_DIR}/style.css" | head -1 | tr -d '\r'
)"
function_version="$(
	sed -n "s/.*WP_VIBECODER_STARTER_VERSION'[[:space:]]*,[[:space:]]*'\\([^']*\\)'.*/\\1/p" "${THEME_DIR}/functions.php" | head -1
)"
config_version="$(
	sed -n 's/^[[:space:]]*"version":[[:space:]]*"\([^"]*\)".*/\1/p' "${CONFIG_FILE}" | head -1
)"

[[ -n "${style_version}" ]] || fail "Theme Version header is missing."
[[ -n "${function_version}" ]] || fail "WP_VIBECODER_STARTER_VERSION is missing."
[[ -n "${config_version}" ]] || fail "wp-vibecoder.json version is missing."
[[ "${style_version}" == "${function_version}" ]] || fail "style.css and functions.php versions do not match."
[[ "${style_version}" == "${config_version}" ]] || fail "Theme and wp-vibecoder.json versions do not match."

if command -v php >/dev/null 2>&1; then
	php -r '
		$image = getimagesize($argv[1]);
		if (!$image || $image[0] !== 1200 || $image[1] !== 900 || $image[2] !== IMAGETYPE_PNG) {
			fwrite(STDERR, "screenshot.png must be a 1200x900 PNG\n");
			exit(1);
		}
	' "${THEME_DIR}/screenshot.png"
elif command -v sips >/dev/null 2>&1; then
	width="$(sips -g pixelWidth "${THEME_DIR}/screenshot.png" | awk '/pixelWidth/ {print $2}')"
	height="$(sips -g pixelHeight "${THEME_DIR}/screenshot.png" | awk '/pixelHeight/ {print $2}')"
	format="$(sips -g format "${THEME_DIR}/screenshot.png" | awk '/format/ {print $2}')"
	[[ "${width}" == "1200" && "${height}" == "900" && "${format}" == "png" ]] ||
		fail "screenshot.png must be a 1200x900 PNG."
elif command -v file >/dev/null 2>&1; then
	image_info="$(file "${THEME_DIR}/screenshot.png")"
	[[ "${image_info}" == *"PNG image data, 1200 x 900"* ]] ||
		fail "screenshot.png must be a 1200x900 PNG."
else
	warn "No image inspection tool is available; screenshot dimensions were not verified."
fi

if command -v php >/dev/null 2>&1; then
	while IFS= read -r reference; do
		[[ -z "${reference}" ]] && continue
		[[ "${reference}" =~ ^(https?:)?// ]] && continue
		[[ "${reference}" =~ ^(data:|#|mailto:|tel:) ]] && continue
		path="${reference%%\?*}"
		path="${path%%\#*}"
		[[ -e "${THEME_DIR}/${path}" ]] || fail "Missing local theme asset referenced in templates: ${reference}"
	done < <(
		php -r '
			foreach (glob($argv[1] . "/*.php") as $file) {
				$source = file_get_contents($file);
				if (preg_match_all("/(?:src|href)=[\"\x27]([^\"\x27]+)[\"\x27]/i", $source, $matches)) {
					foreach ($matches[1] as $value) {
						if (strpos($value, "<?") === false) {
							echo $value, PHP_EOL;
						}
					}
				}
			}
		' "${THEME_DIR}"
	)
else
	warn "Local asset-reference inspection was skipped because PHP CLI is unavailable."
fi

if [[ "${WARNINGS}" -gt 0 ]]; then
	echo "Validation completed with ${WARNINGS} warning(s). Release version: ${style_version}"
else
	echo "Validation passed. Release version: ${style_version}"
fi
