<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Afiliación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @layer utilities {
            .scrollbar-thin {
                scrollbar-width: thin;
                scrollbar-color: #B2DFDB transparent;
            }
            .input-focus {
                @apply ring-2 ring-[#00796B] border-transparent;
            }
            .bg-select-arrow {
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%236B7280' viewBox='0 0 20 20'%3E%3Cpath d='M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 0.75rem center;
                background-size: 1.5em;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen" x-data="{ isOpen: false }">
    <!-- Navbar Vertical Mobile -->
    <div class="lg:hidden fixed top-0 w-full z-50">
        <div class="bg-[#00796B] p-4 flex justify-between items-center">
            <button @click="isOpen = !isOpen" class="text-white">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <span class="text-white font-bold text-xl">MediFinder</span>
        </div>
        <div class="fixed inset-0 bg-black/50 z-40" x-show="isOpen" @click="isOpen = false" x-cloak></div>
        <nav class="fixed left-0 top-0 h-full w-64 bg-white shadow-2xl nav-transition z-50" :class="isOpen ? 'translate-x-0' : '-translate-x-full'" x-cloak>
            <div class="p-4 border-b-2 border-[#B2DFDB]">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-clinic-medical text-3xl text-[#00796B]"></i>
                    <span class="text-xl font-bold text-[#004D40]">MediFinder</span>
                </div>
            </div>
            <div class="p-4 space-y-4">
                <a href="#" class="flex items-center text-[#004D40] hover:bg-[#E0F2F1] p-3 rounded-lg">
                    <i class="fas fa-home mr-3 text-lg w-6 text-center"></i>
                    <span class="font-medium">Inicio</span>
                </a>
                <a href="#" class="flex items-center bg-[#B2DFDB] text-[#004D40] p-3 rounded-lg">
                    <i class="fas fa-list-check mr-3 text-lg w-6 text-center"></i>
                    <span class="font-medium">Solicitudes</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Navbar Vertical Desktop -->
    <nav class="hidden lg:block fixed left-0 top-0 h-full w-64 bg-white shadow-xl z-30">
        <div class="p-6 border-b-2 border-[#B2DFDB]">
            <div class="flex items-center space-x-3">
                <i class="fas fa-clinic-medical text-3xl text-[#00796B]"></i>
                <span class="text-xl font-bold text-[#004D40]">MediFinder</span>
            </div>
        </div>
        <div class="p-4 space-y-4">
            <a href="#" class="flex items-center text-[#004D40] hover:bg-[#E0F2F1] p-3 rounded-lg">
                <i class="fas fa-home mr-3 text-lg w-6 text-center"></i>
                <span class="font-medium">Inicio</span>
            </a>
            <a href="#" class="flex items-center bg-[#B2DFDB] text-[#004D40] p-3 rounded-lg">
                <i class="fas fa-list-check mr-3 text-lg w-6 text-center"></i>
                <span class="font-medium">Solicitudes</span>
            </a>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="lg:ml-64 pt-20 lg:pt-6">
        <div class="container mx-auto px-4 py-8 max-w-4xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-[#B2DFDB] hover:shadow-2xl transition-shadow">
                <!-- Encabezado -->
                <div class="bg-gradient-to-r from-[#00796B] to-[#004D40] px-8 py-6">
                    <h1 class="text-3xl font-bold text-white flex items-center space-x-3">
                        <i class="fas fa-file-medical"></i>
                        <span>Registro de Afiliación</span>
                    </h1>
                </div>
                
                <!-- Formulario -->
                <div class="p-8">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('solicitud.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Columna Izquierda -->
                            <div class="space-y-6">
                                <!-- Nombre de la farmacia -->
                                <div class="relative">
                                    <label for="nombre_farmacia" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-prescription-bottle mr-2 text-[#00796B]"></i>
                                        Nombre de la farmacia
                                    </label>
                                    <input type="text" id="nombre_farmacia" name="nombre_farmacia" value="{{ old('nombre_farmacia') }}" required
                                        class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus placeholder-[#80CBC4]">
                                    @error('nombre_farmacia')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>

                                  <!-- Ciudad -->
                                <div class="relative">
                                    <label for="ciudad" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-city mr-2 text-[#00796B]"></i>
                                        Ciudad
                                    </label>
                                    <select id="ciudad" name="ciudad" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus bg-select-arrow appearance-none">
                                        <option value="">Seleccione ciudad...</option>
                                        @foreach($ciudades as $c)
                                          <option value="{{ $c->id }}" @selected(old('ciudad') == $c->id)>
                                            {{ $c->nombre }}
                                          </option>
                                        @endforeach
                                      </select>
                                    @error('ciudad')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>

                                <!-- NIT -->
                                <div class="relative">
                                    <label for="nit" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-fingerprint mr-2 text-[#00796B]"></i>
                                        NIT
                                    </label>
                                    <input type="text" id="nit" name="nit" value="{{ old('nit') }}" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus placeholder-[#80CBC4]">
                                    @error('nit')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>

                                <!-- Email -->
                                <div class="relative">
                                    <label for="email" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-envelope-open-text mr-2 text-[#00796B]"></i>
                                        Correo electrónico
                                    </label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus placeholder-[#80CBC4]">
                                    @error('email')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <!-- Columna Derecha -->
                            <div class="space-y-6">
                                <!-- Dirección -->
                                <div class="relative">
                                    <label for="direccion" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-map-marker-alt mr-2 text-[#00796B]"></i>
                                        Dirección
                                    </label>
                                    <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus placeholder-[#80CBC4]">
                                    @error('direccion')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>

                                    <!-- Departamento -->
                                <div class="relative">
                                    <label for="departamento" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-map-marked-alt mr-2 text-[#00796B]"></i>
                                        Departamento
                                    </label>
                                    <select id="departamento" name="departamento"
                                        class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus bg-select-arrow appearance-none">
                                        <option value="">Seleccione departamento...</option>
                                        {{-- Se poblará con JS --}}
                                    </select>
                                </div>

                                <!-- Representante Legal -->
                                <div class="relative">
                                    <label for="representante_legal" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-user-tie mr-2 text-[#00796B]"></i>
                                        Representante Legal
                                    </label>
                                    <select id="representante_legal" name="representante_legal" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus bg-select-arrow appearance-none">
                                        <option value="">Seleccione...</option>
                                        <option value="Johan Ordoñez" @if(old('representante_legal')=='Johan Ordoñez') selected @endif>Johan Ordoñez</option>
                                    </select>
                                    @error('representante_legal')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>

                                <!-- Teléfono -->
                                <div class="relative">
                                    <label for="telefono" class="block text-sm font-semibold text-[#004D40] mb-2">
                                        <i class="fas fa-mobile-alt mr-2 text-[#00796B]"></i>
                                        Teléfono
                                    </label>
                                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" required class="w-full px-4 py-3 border-2 border-[#B2DFDB] rounded-lg focus:input-focus placeholder-[#80CBC4]">
                                    @error('telefono')<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Documentos -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">@foreach(['registro_comercio'=>'file-contract','licencia_funcionamiento'=>'file-invoice-dollar','registro_sanitario'=>'file-medical'] as $field=>$icon)
                            <div class="relative group">
                                <label for="{{ $field }}" class="block text-sm font-semibold text-[#004D40] mb-2"><i class="fas fa-{{ $icon }} mr-2 text-[#00796B]"></i>{{ ucfirst(str_replace('_',' ',$field)) }}</label>
                                <div class="relative cursor-pointer">
                                    <input type="file" id="{{ $field }}" name="{{ $field }}" accept="application/pdf" required class="w-full opacity-0 absolute inset-0 z-20 cursor-pointer">
                                    <div class="h-32 border-2 border-dashed border-[#B2DFDB] rounded-lg group-hover:border-[#00796B] transition-colors flex items-center justify-center bg-[#E0F2F1]/30">
                                        <div class="text-center"><i class="fas fa-cloud-upload-alt text-[#00796B] text-2xl mb-2"></i><p class="text-sm text-[#004D40] font-medium">Subir PDF</p></div>
                                    </div>
                                </div>
                                @error($field)<p class="mt-2 text-sm text-red-600 flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}</p>@enderror
                            </div>@endforeach
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col md:flex-row justify-end gap-4 pt-8">
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-[#00796B] to-[#004D40] text-white rounded-lg hover:from-[#004D40] hover:to-[#00332B] transition-all shadow-md hover:shadow-lg flex items-center justify-center"><i class="fas fa-paper-plane mr-2"></i>Enviar Solicitud</button>
                            <a href="{{ url()->previous() }}" class="px-8 py-3 bg-[#B2DFDB] hover:bg-[#80CBC4] text-[#004D40] rounded-lg transition-colors shadow-md hover:shadow-lg flex items-center justify-center"><i class="fas fa-times mr-2"></i>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('ciudad').addEventListener('change', function() {
          const ciudadId = this.value;
          const deptoSelect = document.getElementById('departamento');
          deptoSelect.innerHTML = '<option value="">Cargando...</option>';
          fetch(`/api/ciudad/${ciudadId}/departamentos`)
            .then(res => res.json())
            .then(departamentos => {
              deptoSelect.innerHTML = '<option value="">Seleccione departamento...</option>';
              departamentos.forEach(d => {
                let opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = d.nombre;
                deptoSelect.appendChild(opt);
              });
            })
            .catch(() => {
              deptoSelect.innerHTML = '<option value="">Error cargando</option>';
            });
        });
      </script>
      
</body>
</html>
