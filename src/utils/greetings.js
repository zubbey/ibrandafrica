function greetings() {
  const d = new Date();
  const time = d.getHours();
  let msg;

  if (time < 12) {
    msg = "Good morning!";
  }
  if (time > 12) {
    msg = "Good afternoon!";
  }
  if (time === 12) {
    msg = "Go eat lunch!";
  }

  return msg;
}

export default greetings;
