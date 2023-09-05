`



INSERT INTO `cajas` (`id`, `tipo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Automatica', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'Manual', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO `combustibles` (`id`, `nombre`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gasolina', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'Diesel', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 'GLP', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 'Electricidad', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);




INSERT INTO `marcas` (`nombre`, `status`, `created_at`, `updated_at`) VALUES
('Toyota', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Ford', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Honda', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Chevrolet', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Volkswagen', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Nissan', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Hyundai', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Kia', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Mazda', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Subaru', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO `modelos` (`nombre`, `marca_id`, `status`, `created_at`, `updated_at`) VALUES
('Camry', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Corolla', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Rav4', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Mustang', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('F-150', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Explorer', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Civic', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Accord', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('CR-V', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Cruze', 4, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Malibu', 4, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Equinox', 4, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Jetta', 5, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Passat', 5, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Tiguan', 5, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Altima', 6, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Maxima', 6, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Rogue', 6, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Elantra', 7, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Tucson', 7, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Santa Fe', 7, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Forte', 8, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sorento', 8, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sportage', 8, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Mazda3', 9, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Mazda6', 9, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('CX-5', 9, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Impreza', 10, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Outback', 10, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Forester', 10, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `sucursales` (`nombre`, `codigo`, `calle`, `num_exterior`, `num_interior`, `localidad`, `colonia`, `ciudad`, `cod_postal`, `referencia`, `municipio`, `pais`, `estado`, `created_at`, `updated_at`) VALUES
('Sucursal A', 1001, 'Calle Principal', '123', 'Apto 4B', 'Localidad 1', 'Colonia Centro', 'Ciudad A', '12345', 'Cerca del parque', 'Municipio A', 'País A', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sucursal B', 1002, 'Avenida Principal', '456', NULL, 'Localidad 2', 'Colonia Norte', 'Ciudad B', '67890', 'Frente al centro comercial', 'Municipio B', 'País A', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sucursal C', 1003, 'Calle Secundaria', '789', 'Oficina 3C', 'Localidad 3', 'Colonia Este', 'Ciudad C', '23456', 'Junto al supermercado', 'Municipio C', 'País B', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sucursal D', 1004, 'Avenida Central', '1011', NULL, 'Localidad 4', 'Colonia Oeste', 'Ciudad D', '34567', 'Al lado del hospital', 'Municipio D', 'País A', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Sucursal E', 1005, 'Calle Residencial', '1213', 'Condominio 2E', 'Localidad 5', 'Colonia Sur', 'Ciudad E', '45678', 'Frente al parque deportivo', 'Municipio E', 'País C', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);



INSERT INTO `suspensiones` (`tipo`, `status`, `created_at`, `updated_at`) VALUES
('Suspensión MacPherson', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión de Brazo Oscilante', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión Multibrazo', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión de Barra de Torsión', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión de Muelle Helicoidal', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión Neumática', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión Electrónica', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Suspensión de Doble Horquilla', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Vehículos de Gasolina
INSERT INTO `vehiculos` (`modelo_id`, `precio`, `combustible_id`, `potencia`, `matricula`, `torque_maximo`, `ubicacion`, `cilindros`, `diametro_carrera`, `cilindraje`, `compresion`, `alimentacion`, `caja_id`, `velocidades`, `traccion`, `delantera_suspension_id`, `trasera_suspension_id`, `frenos_delanteros`, `color`, `anio`, `descripcion`, `sucursal_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 25000.00, 1, '180', 'ABC123', '200', 'Frontal', '4 cilindros', '85.0 mm x 74.5 mm', '2000 cc', '10.5', 'Inyección de Gasolina', 1, 6, 'Tracción delantera', 1, 3, 'Discos ventilados', 'Rojo', 2023, 'Este automóvil es un sedán deportivo con excelentes características.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 28000.00, 1, '210', 'DEF456', '250', 'Frontal', '4 cilindros', '86.5 mm x 75.0 mm', '2200 cc', '10.0', 'Inyección de Gasolina', 2, 6, 'Tracción en las cuatro ruedas', 2, 4, 'Discos ventilados', 'Azul', 2023, 'Este SUV ofrece comodidad y rendimiento en un paquete elegante.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 26000.00, 1, '190', 'GHI789', '230', 'Frontal', '4 cilindros', '87.0 mm x 74.5 mm', '2100 cc', '10.2', 'Inyección de Gasolina', 1, 6, 'Tracción delantera', 3, 2, 'Discos ventilados', 'Plateado', 2023, 'Un sedán confiable con un gran ahorro de combustible.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 31000.00, 1, '240', 'JKL101', '280', 'Frontal', '4 cilindros', '88.5 mm x 76.0 mm', '2300 cc', '10.5', 'Inyección de Gasolina', 2, 6, 'Tracción en las cuatro ruedas', 4, 3, 'Discos ventilados', 'Blanco', 2023, 'Un SUV versátil con espacio para la familia.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(5, 27000.00, 1, '200', 'MNO121', '240', 'Frontal', '4 cilindros', '87.5 mm x 75.0 mm', '2300 cc', '10.0', 'Inyección de Gasolina', 1, 6, 'Tracción delantera', 5, 4, 'Discos ventilados', 'Gris', 2023, 'Un sedán moderno con tecnología avanzada.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Vehículos de GLP
INSERT INTO `vehiculos` (`modelo_id`, `precio`, `combustible_id`, `potencia`, `matricula`, `torque_maximo`, `ubicacion`, `cilindros`, `diametro_carrera`, `cilindraje`, `compresion`, `alimentacion`, `caja_id`, `velocidades`, `traccion`, `delantera_suspension_id`, `trasera_suspension_id`, `frenos_delanteros`, `color`, `anio`, `descripcion`, `sucursal_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 28000.00, 3, '190', 'PQR131', '270', 'Frontal', '4 cilindros', '86.0 mm x 73.0 mm', '2100 cc', '10.2', 'Inyección de GLP', 1, 6, 'Tracción delantera', 1, 3, 'Discos ventilados', 'Rojo', 2023, 'Un sedán confiable con un gran ahorro de combustible.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(7, 30000.00, 3, '210', 'STU141', '290', 'Frontal', '4 cilindros', '86.5 mm x 74.0 mm', '2200 cc', '10.0', 'Inyección de GLP', 2, 6, 'Tracción en las cuatro ruedas', 2, 4, 'Discos ventilados', 'Azul', 2023, 'Este SUV ofrece comodidad y rendimiento en un paquete elegante.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(8, 29000.00, 3, '195', 'VWX151', '250', 'Frontal', '4 cilindros', '86.0 mm x 73.5 mm', '2100 cc', '10.5', 'Inyección de GLP', 1, 6, 'Tracción delantera', 3, 2, 'Discos ventilados', 'Plateado', 2023, 'Un sedán moderno con tecnología avanzada.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(9, 32000.00, 3, '220', 'YZA161', '270', 'Frontal', '4 cilindros', '87.5 mm x 74.5 mm', '2300 cc', '10.2', 'Inyección de GLP', 2, 6, 'Tracción en las cuatro ruedas', 4, 3, 'Discos ventilados', 'Blanco', 2023, 'Un SUV versátil con espacio para la familia.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(10, 27000.00, 3, '200', 'BCD171', '260', 'Frontal', '4 cilindros', '87.0 mm x 75.0 mm', '2300 cc', '10.0', 'Inyección de GLP', 1, 6, 'Tracción delantera', 5, 4, 'Discos ventilados', 'Gris', 2023, 'Un sedán confiable con un gran ahorro de combustible.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Vehículos de Diesel
INSERT INTO `vehiculos` (`modelo_id`, `precio`, `combustible_id`, `potencia`, `matricula`, `torque_maximo`, `ubicacion`, `cilindros`, `diametro_carrera`, `cilindraje`, `compresion`, `alimentacion`, `caja_id`, `velocidades`, `traccion`, `delantera_suspension_id`, `trasera_suspension_id`, `frenos_delanteros`, `color`, `anio`, `descripcion`, `sucursal_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 26000.00, 2, '180', 'CDE181', '230', 'Frontal', '4 cilindros', '85.0 mm x 74.5 mm', '2000 cc', '10.5', 'Inyección de Diesel', 1, 6, 'Tracción delantera', 1, 3, 'Discos ventilados', 'Rojo', 2023, 'Este automóvil es un sedán deportivo con excelentes características.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(12, 29000.00, 2, '210', 'EFG191', '260', 'Frontal', '4 cilindros', '86.5 mm x 75.0 mm', '2200 cc', '10.0', 'Inyección de Diesel', 2, 6, 'Tracción en las cuatro ruedas', 2, 4, 'Discos ventilados', 'Azul', 2023, 'Este SUV ofrece comodidad y rendimiento en un paquete elegante.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(13, 27000.00, 2, '195', 'HIJ201', '240', 'Frontal', '4 cilindros', '86.0 mm x 73.0 mm', '2100 cc', '10.2', 'Inyección de Diesel', 2, 6, 'Tracción delantera', 3, 2, 'Discos ventilados', 'Plateado', 2023, 'Un sedán confiable con un gran ahorro de combustible.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(14, 32000.00, 2, '220', 'IJK211', '270', 'Frontal', '4 cilindros', '87.5 mm x 74.5 mm', '2300 cc', '10.5', 'Inyección de Diesel', 2, 6, 'Tracción en las cuatro ruedas', 4, 3, 'Discos ventilados', 'Blanco', 2023, 'Un SUV versátil con espacio para la familia.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(15, 29000.00, 2, '200', 'KLM221', '250', 'Frontal', '4 cilindros', '87.0 mm x 75.0 mm', '2300 cc', '10.0', 'Inyección de Diesel', 1, 6, 'Tracción delantera', 5, 4, 'Discos ventilados', 'Gris', 2023, 'Un sedán moderno con tecnología avanzada.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Vehículos Eléctricos
INSERT INTO `vehiculos` (`modelo_id`, `precio`, `combustible_id`, `potencia`, `matricula`, `torque_maximo`, `ubicacion`, `cilindros`, `diametro_carrera`, `cilindraje`, `compresion`, `alimentacion`, `caja_id`, `velocidades`, `traccion`, `delantera_suspension_id`, `trasera_suspension_id`, `frenos_delanteros`, `color`, `anio`, `descripcion`, `sucursal_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 25000.00, 4, '180', 'AZC123', '200', 'Frontal', '4 cilindros', '85.0 mm x 74.5 mm', '2000 cc', '10.5', 'Eléctrica', 1, 6, 'Tracción delantera', 1, 3, 'Discos ventilados', 'Rojo', 2023, 'Este automóvil es un sedán deportivo con excelentes características.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 28000.00, 4, '310', 'XYZ456', '350', 'Frontal', '6 cilindros', '90.0 mm x 80.0 mm', '3000 cc', '11.0', 'Eléctrica', 2, 8, 'Tracción trasera', 2, 4, 'Discos ventilados', 'Azul', 2023, 'Este vehículo es un poderoso deportivo con un diseño impresionante.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 32000.00, 4, '200', 'DEF789', '280', 'Trasera', '4 cilindros', '88.0 mm x 75.0 mm', '2200 cc', '10.0', 'Eléctrica', 1, 6, 'Tracción en las cuatro ruedas', 3, 3, 'Discos ventilados', 'Plateado', 2023, 'Este SUV ofrece comodidad y rendimiento en un paquete elegante.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 22000.00, 4, '150', 'GHI101', '190', 'Central', '4 cilindros', '82.5 mm x 70.0 mm', '1800 cc', '9.5', 'Eléctrica', 1, 5, 'Tracción delantera', 4, 1, 'Discos sólidos', 'Blanco', 2023, 'Un sedán compacto ideal para la ciudad.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(5, 29000.00, 4, '325', 'JKL121', '360', 'Trasera', '6 cilindros', '91.0 mm x 81.5 mm', '3200 cc', '11.5', 'Eléctrica', 2, 8, 'Tracción en las cuatro ruedas', 5, 4, 'Discos ventilados', 'Negro', 2023, 'Este vehículo todoterreno está listo para la aventura.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(6, 27000.00, 4, '190', 'MNO131', '270', 'Frontal', '4 cilindros', '86.0 mm x 73.0 mm', '2100 cc', '10.2', 'Eléctrica', 2, 6, 'Tracción delantera', 6, 2, 'Discos ventilados', 'Gris', 2023, 'Un sedán confiable con un gran ahorro de combustible.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(7, 35000.00, 4, '260', 'PQR141', '320', 'Central', '6 cilindros', '92.0 mm x 78.0 mm', '2800 cc', '11.3', 'Eléctrica', 2, 8, 'Tracción trasera', 2, 4, 'Discos ventilados', 'Rojo', 2023, 'Un automóvil deportivo con un interior lujoso.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(8, 24000.00, 4, '175', 'STU151', '210', 'Frontal', '4 cilindros', '87.5 mm x 74.5 mm', '2300 cc', '10.0', 'Eléctrica', 1, 6, 'Tracción en las cuatro ruedas', 3, 3, 'Discos ventilados', 'Azul', 2023, 'Un SUV versátil con espacio para la familia.', 2, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(9, 26000.00, 4, '205', 'VWX161', '240', 'Central', '4 cilindros', '88.5 mm x 76.0 mm', '2500 cc', '10.5', 'Eléctrica', 1, 6, 'Tracción delantera', 4, 1, 'Discos sólidos', 'Negro', 2023, 'Este SUV eléctrico combina rendimiento y sostenibilidad.', 3, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(10, 30000.00, 4, '250', 'YZA171', '300', 'Trasera', '6 cilindros', '90.5 mm x 78.5 mm', '2700 cc', '11.0', 'Eléctrica', 1, 8, 'Tracción en las cuatro ruedas', 5, 2, 'Discos ventilados', 'Blanco', 2023, 'Un SUV eléctrico con estilo y tecnología avanzada.', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
