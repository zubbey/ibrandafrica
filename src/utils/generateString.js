/**
 *
 * @param {Number} length
 * @param {Number} suffix
 * @returns
 */

function generateString(length, suffix) {
  let result = "";
  const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  const charactersLength = characters.length;
  let counter = 0;
  while (counter < length) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
    counter += 1;
  }
  return result.concat(suffix);
}

export default generateString;
