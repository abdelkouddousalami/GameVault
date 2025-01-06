const togglePassword = document.getElementById("toggle-password");
const passwordField = document.getElementById("password");

togglePassword.addEventListener("click", () => {
  const type = passwordField.type === "password" ? "text" : "password";
  passwordField.type = type;
  togglePassword.textContent = type === "password" ? "Show" : "Hide";
});
