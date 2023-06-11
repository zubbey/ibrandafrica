/**
 *
 * @param {Number} number
 * @returns Boolean
 */

// CONTANINT
const MIN_AMOUNT = 1000;
const MAX_AMOUNT = 100000;

function isValidAmount(number) {
  let valid = false;
  if (typeof number !== "string") {
    if (number < MIN_AMOUNT || number > MAX_AMOUNT) {
      valid = false;
    } else if (!(number % 5)) {
      valid = true;
    }
  }
  return valid;
}

export default isValidAmount;
