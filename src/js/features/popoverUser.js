const popoverUser = async (data) => {
  const popoverElement = document.querySelector('[data-popover="avatar"');
  const activePopover = new bootstrap.Popover(popoverElement, {
    trigger: "click",
    placement: "bottom",
    html: true,
    content: `
        <div class="popover-all d-flex flex-column gap-3">
              <div class="popover-user_info d-flex justify-content-start align-items-center gap-3">
                  <img src="${data.avatar}" alt="" class="img-thumbnail">
                  <span class="popover-username fw-bold">${data.username}</span>
              </div>
              <a href="./user.php" class="popover-write-btn px-4 py-2 rounded-5">
                  <span class="text-dark fw-medium">Xem trang cá nhân</span>
              </a>
          </div>
          <div class="line"></div>
          <div id="logout" class="popover-logout d-flex align-items-center gap-3">
              <i class="fas fa-sign-out-alt opacity-50"></i>
              Đăng xuất
          </div>
          `,
  });
};
export default popoverUser;
