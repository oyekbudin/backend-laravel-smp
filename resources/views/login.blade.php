@include('header')
<style>
    body {
        background: linear-gradient(135deg, #0d6efd, #0dcaf0);!important
    }

    .card {
        backdrop-filter: blur(6px);!important
    }
</style>
<main class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="card shadow-sm border-0" style="width:100%; max-width:380px; border-radius:12px;">

        <div class="card-body p-4">

            <h4 class="text-center mb-4 fw-bold">Login</h4>

            <form method="POST" action="/login">
                @csrf

                <!-- USERNAME -->
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary w-100 py-2">
                    Masuk
                </button>

            </form>

        </div>
    </div>

</main>

@include('footer')
