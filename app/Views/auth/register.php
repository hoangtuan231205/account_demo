<form class="form" method="POST" action="?c=Auth&a=handleRegister">
  <label>Họ tên</label>
  <input type="text" name="name" placeholder="Nguyễn Văn A" required>

  <label>Email</label>
  <input type="email" name="email" placeholder="you@example.com" required>

  <label>Mật khẩu</label>
  <input type="password" name="password" placeholder="Tối thiểu 6 ký tự" required>

  <label>Nhập lại mật khẩu</label>
  <input type="password" name="password2" placeholder="Nhập lại mật khẩu" required>

  <button class="btn" type="submit">Tạo tài khoản</button>

  <div class="hint">
    Đã có tài khoản? <a href="?c=Auth&a=login">Đăng nhập</a>
  </div>
</form>
