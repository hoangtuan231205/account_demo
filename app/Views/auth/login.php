<form class="form" method="POST" action="?c=Auth&a=handleLogin">
  <label>Email</label>
  <input type="email" name="email" placeholder="you@example.com" required>

  <label>Mật khẩu</label>
  <div class="pw">
    <input type="password" name="password" placeholder="••••••••" required>
  </div>

  <button class="btn" type="submit">Đăng nhập</button>

  <div class="hint">
    Chưa có tài khoản? <a href="?c=Auth&a=register">Đăng ký</a>
  </div>
</form>
