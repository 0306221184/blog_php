import popoverUser from "./features/popoverUser.js";
import popoverNotification from "./features/popoverNotification.js";
import logoutEvent from "./eventListener/logoutEvent.js";
import fetchData from "./features/fetchData.js";
import avatarInputFileEvent from "./eventListener/avatarInputFileEvent.js";
// import signUpAccount from "./features/signUp.js";

//Main Thread
// await signUpAccount();
const user = await fetchData("./api/getUser.php");
const notifications = await fetchData("./api/getNotification.php");
console.log(notifications);

popoverNotification(user);
popoverUser(user);

//EventListener

logoutEvent();
avatarInputFileEvent();
