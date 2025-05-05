<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Afiliación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#F4E9CD]">
    <!-- Navbar -->
    <nav class="bg-[#031926] shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="flex items-center space-x-3">
                    <i class="fas fa-clinic-medical text-2xl text-[#9DBEBB]"></i>
                    <span class="text-xl font-bold text-[#F4E9CD]">Sistema de Afiliaciones</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-[#9DBEBB]/20">
            <!-- Encabezado -->
            <div class="bg-[#468189] px-6 py-5">
                <h1 class="text-2xl font-bold text-[#F4E9CD]">Registro de Solicitud de Afiliación</h1>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('afiliaciones.store') }}" enctype="multipart/form-data" class="px-6 py-8 space-y-6">
                @csrf

                @if($errors->any())
                <div class="bg-[#9D3B3B]/10 border border-[#9D3B3B]/30 text-[#9D3B3B] px-4 py-3 rounded-xl">
                    <ul class="list-disc list-inside space-y-2">
                        @foreach ($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Sección de Datos Básicos -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Columna Izquierda -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Nombre de la Farmacia *</label>
                            <input type="text" name="nombre_farmacia" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all"
                                value="{{ old('nombre_farmacia') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Departamento *</label>
                            <select name="departamento_id" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all">
                                @foreach($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                        {{ $departamento->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Ciudad *</label>
                            <select name="ciudad_id" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all">
                                @foreach($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>
                                        {{ $ciudad->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Dirección *</label>
                            <input type="text" name="direccion" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all"
                                value="{{ old('direccion') }}">
                        </div>
                    </div>

                    <!-- Columna Derecha -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">NIT *</label>
                            <input type="text" name="nit" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all"
                                value="{{ old('nit') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Correo Electrónico *</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all"
                                value="{{ old('email') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Teléfono *</label>
                            <input type="tel" name="telefono" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all"
                                value="{{ old('telefono') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Representante Legal *</label>
                            <select name="representante_id" required
                                class="w-full px-4 py-2.5 rounded-lg border-2 border-[#9DBEBB]/30 focus:border-[#468189] focus:ring-2 focus:ring-[#9DBEBB]/50 transition-all">
                                @foreach($representantes as $representante)
                                    <option value="{{ $representante->id }}" {{ old('representante_id') == $representante->id ? 'selected' : '' }}>
                                        {{ $representante->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de Documentos -->
                <div class="space-y-6 pt-6 border-t border-[#9DBEBB]/30">
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-[#031926]">Documentos Requeridos</h3>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Registro de Cámara de Comercio (PDF) *</label>
                            <input type="file" name="camara_comercio" accept="application/pdf" required
                                class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#468189] file:text-[#F4E9CD] hover:file:bg-[#386873] transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Licencia de Funcionamiento (PDF) *</label>
                            <input type="file" name="licencia_funcionamiento" accept="application/pdf" required
                                class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#468189] file:text-[#F4E9CD] hover:file:bg-[#386873] transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#468189] mb-2">Registro Sanitario (PDF) *</label>
                            <input type="file" name="registro_sanitario" accept="application/pdf" required
                                class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#468189] file:text-[#F4E9CD] hover:file:bg-[#386873] transition-all">
                        </div>
                    </div>
                </div>

                <!-- Acciones del Formulario -->
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-[#9DBEBB]/30">
                    <a href="{{ route('afiliaciones.index') }}" class="px-6 py-2.5 bg-[#9DBEBB]/20 text-[#468189] rounded-lg hover:bg-[#9DBEBB]/30 transition-colors flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-[#468189] text-[#F4E9CD] rounded-lg hover:bg-[#386873] transition-colors flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar Solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        input:focus, select:focus, button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(70, 129, 137, 0.2);
        }
        
        ::placeholder {
            color: #9DBEBB;
            opacity: 0.6;
        }
        
        input[type="file"]::-webkit-file-upload-button {
            @apply bg-[#468189] text-[#F4E9CD] py-2 px-4 rounded-lg border-0 cursor-pointer transition-all;
        }
        
        input[type="file"]::-webkit-file-upload-button:hover {
            @apply bg-[#386873];
        }
    </style>
</body>
</html>