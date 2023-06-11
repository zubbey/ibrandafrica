import { replace } from "lodash";
import numeral from "numeral";

// ----------------------------------------------------------------------

export function fCurrency(number) {
  const amount = `₦${numeral(number).format(!number ? "0,0.00" : "0,0[.]00")}`;

  return amount;
}

export function fPercent(amount, percent) {
  return numeral((amount * percent) / 100).value();
}

export function fNumber(number) {
  return numeral(number).value();
}

export function fNumberToString(number) {
  return numeral(number).format();
}

export function fShortenNumber(number) {
  return replace(numeral(number).format("0.00a"), ".00", "");
}

export function fData(number) {
  return numeral(number).format("0.0 b");
}

export function dCalculator(number) {
  const now = new Date();
  const dueDate = new Date(now);
  dueDate.setDate(now.getDate() + number);

  return dueDate;
}
