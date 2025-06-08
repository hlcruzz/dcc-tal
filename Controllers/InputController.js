export default function sliceText(txt, limit) {
  return txt.length > limit ? txt.substr(0, limit) + "..." : txt;
}
