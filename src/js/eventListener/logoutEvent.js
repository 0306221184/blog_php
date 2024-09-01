const logoutEvent = () => {
  document.addEventListener("click", (event) => {
    if (event.target && event.target.id === "logout") {
      fetch("./api/logout.php", {
        method: "POST",
      })
        .then((response) => response.text())
        .then((data) => {
          window.location.href = "./"; // Change to your login page
        })
        .catch((error) => console.error("Error:", error));
    }
  });
};
export default logoutEvent;
