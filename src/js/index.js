import popoverUser from "./popoverUser.js";
import logoutEvent from "./eventListener/logoutEvent.js";
import getUser from "./getUser.js";

//Main Thread
const user = await getUser("./src/api/getUser.php");
popoverUser(user);

//EventListener

logoutEvent();
