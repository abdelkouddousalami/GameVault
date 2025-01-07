<style>.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background-color: #1e3262;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .navbar img{
    width: 150px;
    height: 50px;
    object-fit: cover;
    margin-top: 10px;
  }
  
  .navbar .logo a {
    font-size: 2rem;
    font-weight: bold;
    color: #d77e9f;
    text-decoration: none;
  }
  
  .navbar .nav-links {
    list-style: none;
    display: flex;
    gap: 1.5rem;
  }
  
  .navbar .nav-links li a {
    text-decoration: none;
    color: #f0f3fa;
    font-size: 1rem;
    font-weight: 600;
    transition: color 0.3s ease;
  }
  
  .navbar .nav-links li a:hover {
    color: #b34c37;
  }
  
  .navbar .login-btn a {
    background-color: #d77e9f;
    color: #1e3262;
    padding: 0.5rem 1.2rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  
  .navbar .login-btn a:hover {
    background-color: #b34c37;
    color: #f0f3fa;
  }</style>

<nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="../../img/logo.png" alt=""></a>
        </div>
        <ul class="nav-links">
            <li><a href="../GameVault/index.php">Home</a></li>
            <li><a href="../../library.php">Library</a></li>
            <li><a href="#contact">Games</a></li>
            <li><a href="#games">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="view/login.php">Login</a></div>
    </nav>