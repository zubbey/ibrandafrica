import { format, formatDistanceToNowStrict } from "date-fns";

// ----------------------------------------------------------------------

export function fDate(date) {
  return format(new Date(date || "2022-03-25"), "dd MMMM yyyy");
}

export function fDateTime(date) {
  return format(new Date(date || "2022-03-25"), "dd MMM yyyy HH:mm");
}

export function fDateTimeSuffix(date) {
  return format(new Date(date || "2022-03-25"), "dd/MM/yyyy hh:mm p");
}

export function fToNow(date) {
  return formatDistanceToNowStrict(new Date(date || "2022-03-25"), {
    addSuffix: true,
  });
}
