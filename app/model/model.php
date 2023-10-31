<?php
require_once 'config.php';
    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables)==0) {
                $sql =<<<END
                CREATE TABLE `autores` (
                    `ID` int(11) NOT NULL,
                    `Nombre` varchar(45) NOT NULL,
                    `Apellido` varchar(45) NOT NULL,
                    `Edad` int(11) NOT NULL,
                    `Nacionalidad` varchar(45) NOT NULL,
                    `Foto` varchar(255) DEFAULT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `autores`
                  --
                  
                  INSERT INTO `autores` (`ID`, `Nombre`, `Apellido`, `Edad`, `Nacionalidad`, `Foto`) VALUES
                  (1, 'Matias', 'Del Valle', 23, 'Argentino', NULL),
                  (2, 'lucas', 'zunino', 23, 'argentino', NULL),
                  (3, 'Jordan ', 'Peterson', 61, 'Canada', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Jordan_Peterson_by_Gage_Skidmore.jpg/1200px-Jordan_Peterson_by_Gage_Skidmore.jpg');
                  
                  -- --------------------------------------------------------
                  
                  --
                  -- Estructura de tabla para la tabla `libros`
                  --
                  
                  CREATE TABLE `libros` (
                    `ID` int(11) NOT NULL,
                    `Nombre` varchar(45) NOT NULL,
                    `Genero` varchar(45) NOT NULL,
                    `Autor` int(11) NOT NULL,
                    `Editorial` varchar(45) NOT NULL,
                    `Foto` varchar(255) DEFAULT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `libros`
                  --
                  
                  INSERT INTO `libros` (`ID`, `Nombre`, `Genero`, `Autor`, `Editorial`, `Foto`) VALUES
                  (1, 'Legendario', 'Ciencia Ficcion', 1, 'Zunino Lucas', NULL),
                  (2, '12 Reglas para sobrevivir', 'Autoayuda', 3, 'Penguin Random House', 'https://www.planetadelibros.com.ar/usuaris/libros/fotos/290/m_libros/portada_12-reglas-para-vivir_jordan-b-peterson_201901222004.jpg');
                  
                  -- --------------------------------------------------------
                  
                  --
                  -- Estructura de tabla para la tabla `usuarios`
                  --
                  
                  CREATE TABLE `usuarios` (
                    `ID` int(11) NOT NULL,
                    `Password` varchar(255) NOT NULL,
                    `User` varchar(45) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `usuarios`
                  --
                  
                  
                  
                  --
                  -- Índices para tablas volcadas
                  --
                  
                  --
                  -- Indices de la tabla `autores`
                  --
                  ALTER TABLE `autores`
                    ADD PRIMARY KEY (`ID`);
                  
                  --
                  -- Indices de la tabla `libros`
                  --
                  ALTER TABLE `libros`
                    ADD PRIMARY KEY (`ID`),
                    ADD KEY `fk_libros_autores` (`Autor`);
                  
                  --
                  -- Indices de la tabla `usuarios`
                  --
                  ALTER TABLE `usuarios`
                    ADD PRIMARY KEY (`ID`);
                  
                  --
                  -- AUTO_INCREMENT de las tablas volcadas
                  --
                  
                  --
                  -- AUTO_INCREMENT de la tabla `autores`
                  --
                  ALTER TABLE `autores`
                    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
                  
                  --
                  -- AUTO_INCREMENT de la tabla `libros`
                  --
                  ALTER TABLE `libros`
                    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                  
                  --
                  -- AUTO_INCREMENT de la tabla `usuarios`
                  --
                  ALTER TABLE `usuarios`
                    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
                  
                  --
                  -- Restricciones para tablas volcadas
                  --
                  
                  --
                  -- Filtros para la tabla `libros`
                  --
                  ALTER TABLE `libros`
                    ADD CONSTRAINT `fk_libros_autores` FOREIGN KEY (`Autor`) REFERENCES `autores` (`ID`);
                  COMMIT;
                END;
                $this->db->query($sql);
                $this->admin();
            }
            
        }
        function admin(){
          $query = $this->db->prepare('INSERT INTO `usuarios` (`ID`, `Password`, `User`) VALUES
          (1, "$2a$12$XGQ84TQbuo7Y5UrFLF92SuVohzeZodL1r0MSYc4rB6g7SMZlFKvyC", "webadmin")');
          $query-> execute();
        }
    }