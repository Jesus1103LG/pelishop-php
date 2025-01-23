function limitDigits(input) {
  if (input.value.length > 10) {
    input.value = input.value.slice(0, 10);
  }
  // Validar que solo se permitan números y un solo punto decimal
  const regex = /^\d*\.?\d{0,2}$/; // Permitir hasta 2 decimales
  if (!regex.test(input.value)) {
    input.value = input.value.slice(0, -1);
  }
}
