import popoverUser from "./features/popoverUser.js";
import logoutEvent from "./eventListener/logoutEvent.js";
import getUser from "./features/getUser.js";

//Main Thread
const user = await getUser("./api/getUser.php");
popoverUser(user);

//EventListener

logoutEvent();
