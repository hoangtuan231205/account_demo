<?php
class AuthController extends Controller {

    public function login(): void {
        if (!empty($_SESSION['user'])) {
            echo "<h2 style='font-family:system-ui'>Bạn đã đăng nhập ✅</h2>
                  <p style='font-family:system-ui'>Xin chào <b>{$_SESSION['user']['name']}</b></p>
                  <p><a href='?c=Auth&a=logout'>Logout</a></p>";
            return;
        }

        $error = $_SESSION['flash_error'] ?? null;
        unset($_SESSION['flash_error']);

        $this->view('layouts/auth_layout', [
            'title' => 'Đăng nhập',
            'content' => 'auth/login',
            'error' => $error
        ]);
    }

    public function handleLogin(): void {
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';

        if ($email === '' || $pass === '') {
            $_SESSION['flash_error'] = "Vui lòng nhập đầy đủ Email và Mật khẩu.";
            $this->redirect('?c=Auth&a=login');
        }

        $userModel = new User();
        $u = $userModel->findByEmail($email);

        if (!$u || !password_verify($pass, $u['password_hash'])) {
            $_SESSION['flash_error'] = "Email hoặc mật khẩu không đúng.";
            $this->redirect('?c=Auth&a=login');
        }

        $_SESSION['user'] = [
            'id' => $u['id'],
            'name' => $u['name'],
            'email' => $u['email'],
        ];

        $this->redirect('?c=Auth&a=login');
    }

    public function register(): void {
        $error = $_SESSION['flash_error'] ?? null;
        unset($_SESSION['flash_error']);

        $this->view('layouts/auth_layout', [
            'title' => 'Đăng ký',
            'content' => 'auth/register',
            'error' => $error
        ]);
    }

    public function handleRegister(): void {
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['password'] ?? '';
        $pass2 = $_POST['password2'] ?? '';

        if ($name === '' || $email === '' || $pass === '' || $pass2 === '') {
            $_SESSION['flash_error'] = "Vui lòng nhập đầy đủ thông tin.";
            $this->redirect('?c=Auth&a=register');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash_error'] = "Email không hợp lệ.";
            $this->redirect('?c=Auth&a=register');
        }

        if (strlen($pass) < 6) {
            $_SESSION['flash_error'] = "Mật khẩu tối thiểu 6 ký tự.";
            $this->redirect('?c=Auth&a=register');
        }

        if ($pass !== $pass2) {
            $_SESSION['flash_error'] = "Mật khẩu nhập lại không khớp.";
            $this->redirect('?c=Auth&a=register');
        }

        $userModel = new User();
        if ($userModel->findByEmail($email)) {
            $_SESSION['flash_error'] = "Email đã tồn tại.";
            $this->redirect('?c=Auth&a=register');
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $userModel->create($name, $email, $hash);

        $_SESSION['flash_error'] = "Đăng ký thành công! Giờ đăng nhập nhé 😉";
        $this->redirect('?c=Auth&a=login');
    }

    public function logout(): void {
        session_destroy();
        $this->redirect('?c=Auth&a=login');
    }
}
