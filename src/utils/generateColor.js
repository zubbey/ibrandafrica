function generateColor() {
  const letters = "0123456789ABCDEF".split("");
  let color = "#";

  for (let i = 0; i < 6; i++) {
    const random = Math.floor(Math.random() * letters.length);
    color += letters[random];
  }

  return color;
}

export default generateColor;
