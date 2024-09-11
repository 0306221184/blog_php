import popoverUser from "./features/popoverUser.js";
import logoutEvent from "./eventListener/logoutEvent.js";
import getUser from "./features/getUser.js";
import avatarInputFileEvent from "./eventListener/avatarInputFileEvent.js";
// import signUpAccount from "./features/signUp.js";

//Main Thread
// await signUpAccount();
const user = await getUser("./api/getUser.php");
popoverUser(user);

//EventListener

logoutEvent();
avatarInputFileEvent();
