<style>
    .btn-login {
      border-radius: 50px;
      transition: all 0.3s ease;
      background: #28a745; /* hijau bootstrap */
      color: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .btn-login:hover {
      background: linear-gradient(45deg, #34d058, #28a745);
      transform: scale(1.05);
      box-shadow: 0 8px 15px rgba(0,0,0,0.2);
      color: white;
    }
    .btn-login:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(40,167,69,0.5);
    }
  </style>
  
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <img src="/img/tree.png" width="100%" alt="">
          </div>
          <div class="col-md-6">
              <div class="card mt-5">
                  <div class="card-body">
  
                      <div class="text-center"><strong><h4>LOGIN</h4></strong></div>
                      <p class="text-center">Masukan akses akun anda</p>
                      <form action="">
                          <div class="form-group">
                              <label for=""><b>Username</b></label>
                              <input type="text" name="name" class="form-control" placeholder="Username">
                          </div>
  
                          <div class="form-group mt-3">
                              <label for=""><b>Password</b></label>
                              <input type="password" name="Password" class="form-control" placeholder="*****">
                          </div>
  
                          <button type="submit" class="btn btn-login mt-4 px-4">
                              Login <i class="fas fa-sign-in-alt"></i>
                          </button>
                      </form>
  
                  </div>
              </div>
          </div>
      </div>
  </div>
  