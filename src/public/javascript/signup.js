function limitDigits(input) {
  if (input.value.length > 10) {
    input.value = input.value.slice(0, 10);
  }
}
