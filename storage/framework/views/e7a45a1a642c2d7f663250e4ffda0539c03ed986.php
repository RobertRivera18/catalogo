<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        .login-wrap * { box-sizing: border-box; }

        .login-wrap {
            font-family: 'DM Sans', sans-serif;
            display: flex;
            min-height: 520px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 40px rgba(0,0,0,0.10);
            background: #fff;
        }

        /* ── Sidebar ── */
        .login-sidebar {
            width: 210px;
            flex-shrink: 0;
            background: #D85A30;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2.5rem 1.75rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar-deco {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .sidebar-icon-wrap {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.18);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand {
            font-family: 'DM Serif Display', serif;
            font-size: 24px;
            color: #fff;
            line-height: 1.2;
            margin-top: 1.5rem;
        }

        .sidebar-quote {
            font-size: 12px;
            color: rgba(255,255,255,0.70);
            line-height: 1.6;
            font-weight: 300;
        }

        /* ── Panel ── */
        .login-panel {
            flex: 1;
            padding: 3rem 2.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-family: 'DM Serif Display', serif;
            font-size: 26px;
            color: #1a1a1a;
            margin: 0 0 4px;
            line-height: 1.2;
        }

        .form-subheading {
            font-size: 13px;
            color: #888780;
            margin: 0 0 2rem;
        }

        /* ── Fields ── */
        .field-group { margin-bottom: 1.25rem; }

        .field-label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: #5F5E5A;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .field-wrapper { position: relative; }

        .field-wrapper svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: #B4B2A9;
            pointer-events: none;
        }

        .field-input {
            width: 100%;
            height: 42px;
            border: 1px solid #D3D1C7;
            border-radius: 8px;
            padding: 0 12px 0 38px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: #1a1a1a;
            background: #F1EFE8;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        .field-input:focus {
            border-color: #D85A30;
            box-shadow: 0 0 0 3px rgba(216,90,48,0.12);
            background: #fff;
        }

        .field-input::placeholder { color: #B4B2A9; }

        .forgot-link {
            display: block;
            text-align: right;
            font-size: 12px;
            font-weight: 500;
            color: #D85A30;
            text-decoration: none;
            margin-top: 6px;
            transition: color 0.15s;
        }
        .forgot-link:hover { color: #993C1D; }

        /* ── Remember ── */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .remember-row input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #D85A30;
            cursor: pointer;
            margin: 0;
        }

        .remember-row span {
            font-size: 13px;
            color: #5F5E5A;
        }

        /* ── Button ── */
        .btn-login {
            width: 100%;
            height: 44px;
            background: #D85A30;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            letter-spacing: 0.03em;
            transition: background 0.2s, transform 0.1s;
        }
        .btn-login:hover { background: #993C1D; }
        .btn-login:active { transform: scale(0.98); }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1.5rem 0 1.25rem;
        }
        .divider hr {
            flex: 1;
            border: none;
            border-top: 1px solid #D3D1C7;
        }
        .divider span { font-size: 12px; color: #B4B2A9; }

        /* ── Register ── */
        .register-line {
            text-align: center;
            font-size: 13px;
            color: #5F5E5A;
        }
        .register-line a {
            color: #D85A30;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.15s;
        }
        .register-line a:hover { color: #993C1D; }

        /* ── Trust badges ── */
        .badge-trust {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1px solid #D3D1C7;
        }
        .badge-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: #888780;
        }
        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #1D9E75;
            flex-shrink: 0;
        }

        /* ── Responsive ── */
        @media (max-width: 600px) {
            .login-sidebar { display: none; }
            .login-panel { padding: 2rem 1.5rem; }
        }
    </style>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-xl login-wrap">

            
            <div class="login-sidebar">
                <div class="sidebar-deco" style="width:180px;height:180px;top:-60px;right:-70px;"></div>
                <div class="sidebar-deco" style="width:120px;height:120px;bottom:-40px;left:-50px;"></div>

                <div>
                    <div class="sidebar-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                             viewBox="0 0 24 24" stroke="white" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 00.9 1.45h12.9
                                     M16 16a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                    </div>
                    <p class="sidebar-brand">Tu<br>tienda.</p>
                </div>

                <p class="sidebar-quote">Todo lo que necesitas,<br>en un solo lugar.</p>
            </div>

            
            <div class="login-panel">

                <p class="form-heading">Bienvenido de vuelta</p>
                <p class="form-subheading">Ingresa tus credenciales para continuar</p>

                
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if(session('status')): ?>
                    <div class="mb-4 text-sm font-medium" style="color:#1D9E75;">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    
                    <div class="field-group">
                        <label class="field-label" for="email">Correo electrónico</label>
                        <div class="field-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8
                                         M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input id="email" name="email" type="email"
                                   class="field-input"
                                   value="<?php echo e(old('email')); ?>"
                                   placeholder="correo@ejemplo.com"
                                   required autofocus autocomplete="username" />
                        </div>
                    </div>

                    
                    <div class="field-group">
                        <label class="field-label" for="password">Contraseña</label>
                        <div class="field-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6
                                         a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <input id="password" name="password" type="password"
                                   class="field-input"
                                   placeholder="••••••••"
                                   required autocomplete="current-password" />
                        </div>

                        
                    </div>

                    
                    <div class="remember-row">
                        <input id="remember_me" name="remember" type="checkbox" />
                        <span>Mantener sesión iniciada</span>
                    </div>

                    
                    <button type="submit" class="btn-login">
                        Iniciar sesión
                    </button>

                </form>


                
                <div class="badge-trust">
                    <div class="badge-item"><div class="badge-dot"></div> Conexión segura</div>
                    <div class="badge-item"><div class="badge-dot"></div> Datos cifrados</div>
                    <div class="badge-item"><div class="badge-dot"></div> Sin spam</div>
                </div>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/auth/login.blade.php ENDPATH**/ ?>