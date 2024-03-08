  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="loginLabel">Login</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('login') }}" method="post">
                      @csrf
                      <div class="mb-3 has-validation">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email"
                              placeholder="name@example.com" required>
                      </div>
                      <div class="mb-3 has-validation">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password"
                              placeholder="********" required>
                      </div>
                      <div class="mb-3">
                          <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
