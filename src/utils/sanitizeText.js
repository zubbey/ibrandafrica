/**
 *
 * @param {String} text
 * @returns String
 */

export default function sanitizeText(str) {
  if (typeof str !== "string") {
    return "";
  }
  return str.replace(/[^\w\s]/gi, " ")?.toLowerCase();
}
