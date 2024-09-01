const getUser = async (url) => {
  try {
    const response = await fetch(url, {
      method: "GET",
    });
    const data = response.json();
    return data;
  } catch (error) {
    console.error("Error fetching data:", error);
    return {
      status: "error",
    };
  }
};
export default getUser;
