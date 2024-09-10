// signUp.js

const signUpAccount = async (apiUrl) => {
  const signUpForm = document.getElementById("signUpForm");

  if (signUpForm) {
    signUpForm.addEventListener("submit", async (e) => {
      e.preventDefault(); // Prevent default form submission
      try {
        const formData = {};

        const response = await fetch(apiUrl, {
          method: "POST",
          body: JSON.stringify(formData),
        });
        const data = response.json();
        console.log("sign up data", data);

        return data;
      } catch (error) {
        console.error("Error fetching data:", error);
        return {
          status: "error",
        };
      }
      // Add additional logic for form submission here
    });
  } else {
    console.error("Sign Up Form not found");
  }
};

export default signUpAccount;
