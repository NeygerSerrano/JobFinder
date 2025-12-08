<?php 
$title = "Crear Datos Personales"; 
require './Views/layouts/header.php'; 
?>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📝 Crear Datos Personales</h2>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Grupo 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nro Documento</label>
                    <input type="text" name="nro_documento" class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipo Documento</label>
                    <input type="text" name="tipo_documento" class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
            </div>

            <!-- Grupo 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombres</label>
                    <input type="text" name="nombres" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input type="text" name="apellidos" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
            </div>

            <!-- Grupo 3 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sexo</label>
                    <input type="text" name="sexo" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
            </div>

            <!-- Grupo 4 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dirección</label>
                    <input type="text" name="direccion_residencia" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ciudad</label>
                    <input type="text" name="ciudad_residencia" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
            </div>

            <!-- Grupo 5 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input type="email" name="correo_electronico" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="text" name="telefono" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
            </div>

            <!-- Grupo 6 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" class="mt-1 w-full px-4 py-2 border rounded-md">
            </div>

            <!-- Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Foto (URL o archivo)</label>
                <input type="file" name="foto" class="mt-1 w-full px-4 py-2 border rounded-md file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
            </div>

            <!-- Habilidades -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Habilidad 1</label>
                    <input type="text" name="hab1" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Habilidad 2</label>
                    <input type="text" name="hab2" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Habilidad 3</label>
                    <input type="text" name="hab3" class="mt-1 w-full px-4 py-2 border rounded-md">
                </div>
            </div>

            <!-- Botón guardar -->
            <div class="pt-6">
                <input type="submit" value="Guardar" class="bg-primary hover:bg-primary-700 text-white font-semibold py-2 px-6 rounded-md transition">
            </div>
        </form>

        <!-- Volver al inicio -->
        <div class="mt-6">
            <a href="index.php?controller=datospersonales&action=index" class="text-primary hover:text-primary-800 font-medium transition">
                ⬅️ Volver al inicio
            </a>
        </div>
</div>

<?php require './Views/layouts/footer.php'; ?>
