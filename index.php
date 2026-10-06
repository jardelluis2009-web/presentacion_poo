<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO en PHP - UEF María Auxiliadora</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <header>
        <h1>Programación Orientada a Objetos en PHP version 8.4</h1>
        <p>Unidad Educativa Fiscomisional "María Auxiliadora" | 3ro Informática "A"</p>
    </header>

    <nav>
        <ul>
            <li><a href="#teoria">¿Qué es la POO?</a></li>
            <li><a href="#elementos">Elementos Principales</a></li>
            <li><a href="#pilares">Los 4 Pilares</a></li>
            <li><a href="#ejemplo-practico">Ejemplo Práctico POO</a></li>
            <li><a href="#practica">Cuestionario</a></li>
        </ul>
    </nav>

    <main>
        <!-- SECCIÓN 1: TEORÍA -->
        <section id="teoria">
            <h2>¿Qué es la Programación Orientada a Objetos?</h2>
            <p>La Programación Orientada a Objetos (POO) es un paradigma de programación que nos permite organizar el código agrupando comportamientos y datos similares dentro de "objetos". En lugar de un código lineal lleno de funciones sueltas, estructuramos nuestro programa imitando el mundo real.</p>
            
            <h3>¿Para qué se utiliza?</h3>
            <p>Se utiliza para desarrollar aplicaciones más robustas y escalables. En PHP, la POO nos ayuda a dividir proyectos grandes en piezas independientes, facilitando el trabajo colaborativo y la detección de errores.</p>

            <h3>✨ Ventajas de trabajar con objetos en PHP:</h3>
            <ul>
                <li><strong>Reutilización de código:</strong> Una clase puede usarse múltiples veces.</li>
                <li><strong>Orden y limpieza:</strong> El código queda mucho más organizado y legible.</li>
                <li><strong>Mantenimiento:</strong> Si hay un error, sabemos exactamente en qué objeto buscarlo.</li>
                <li><strong>Seguridad:</strong> Protege información sensible mediante el encapsulamiento.</li>
            </ul>
        </section>

        <!-- SECCIÓN 2: ELEMENTOS PRINCIPALES CON EJEMPLOS DE CÓDIGO -->
        <section id="elementos">
            <h2>Elementos Principales de la POO (Ejemplos en PHP)</h2>
            
            <article>
                <h3>1. Clase</h3>
                <p>Es la plantilla o molde para crear objetos.</p>
                <pre><code>&lt;?php
class Estudiante {
    // Definición de la clase
}
?&gt;</code></pre>
            </article>

            <article>
                <h3>3. Objeto</h3>
                <p>Es la entidad creada a partir de una clase mediante la palabra clave <code>new</code>.</p>
                <pre><code>&lt;?php
$estudiante1 = new Estudiante();
?&gt;</code></pre>
            </article>

            <article>
                <h3>3. Atributos</h3>
                <p>Son las variables o características dentro de la clase.</p>
                <pre><code>&lt;?php
class Estudiante {
    public $nombre;
    public $nota;
}
?&gt;</code></pre>
            </article>

            <article>
                <h3>4. Métodos</h3>
                <p>Son las funciones dentro de la clase que realizan acciones.</p>
                <pre><code>&lt;?php
class Estudiante {
    public function saludar() {
        return "Hola, soy un estudiante";
    }
}
?&gt;</code></pre>
            </article>

            <article>
                <h3>5. Constructor (__construct) y $this</h3>
                <p>El constructor se ejecuta automáticamente al crear el objeto. <code>$this</code> se usa para referirse a las variables de la misma clase.</p>
                <pre><code>&lt;?php
class Estudiante {
    public $nombre;

    public function __construct($nombreRecibido) {
        $this-&gt;nombre =$nombreRecibido;
    }
}
?&gt;</code></pre>
            </article>
        </section>

        <!-- SECCIÓN 3: PILARES -->
        <section id="pilares">
            <h2>Los 4 Pilares de la POO</h2>
            <div class="pilar-grid">
                <div class="pilar-card">
                    <h3>1. Encapsulamiento</h3>
                    <p>Protege los datos restringiendo el acceso directo mediante la palabra clave <code>private</code>.</p>
                </div>
                <div class="pilar-card">
                    <h3>2. Herencia</h3>
                    <p>Permite a una clase hija heredar los atributos y métodos de una clase padre usando <code>extends</code>.</p>
                </div>
                <div class="pilar-card">
                    <h3>3. Polimorfismo</h3>
                    <p>Permite que diferentes clases respondan de manera distinta al mismo método.</p>
                </div>
                <div class="pilar-card">
                    <h3>4. Abstracción</h3>
                    <p>Muestra solo lo esencial del objeto y oculta los detalles complejos internos.</p>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 4: EJEMPLO PRÁCTICO POO -->
        <section id="ejemplo-practico">
            <h2>Ejemplo Práctico en PHP</h2>
            <p>Demostración simple de una clase PHP con sus atributos, constructor y métodos:</p>

            <?php
            // Definición de la Clase Estudiante
            class Estudiante {
                public $nombre;
                public $nota1;
                public $nota2;

                public function __construct($nombre, $nota1, $nota2) {
                    $this->nombre =$nombre;
                    $this->nota1 = $nota1;
                    $this->nota2 = $nota2;
                }

                public function calcularPromedio() {
                    return ($this->nota1 +$this->nota2) / 2;
                }

                public function obtenerEstado() {
                    $promedio =$this->calcularPromedio();
                    if ($promedio >= 7) {
                        return "Aprobado";
                    } else {
                        return "Remedial";
                    }
                }
            }

            // Crear 2 Objetos
            $alumno1 = new Estudiante("Jardel Canga", 8.5, 9.0);
            $alumno2 = new Estudiante("Daniela Ganchozo", 6.0, 6.5);
            ?>

            <div class="demostramcion-poo">
                <h3>Resultados generados por la clase PHP:</h3>
                <ul>
                    <li>
                        <strong>Estudiante:</strong> <?php echo $alumno1->nombre; ?> | 
                        <strong>Promedio:</strong> <?php echo $alumno1->calcularPromedio(); ?> | 
                        <strong>Estado:</strong> <?php echo $alumno1->obtenerEstado(); ?>
                    </li>
                    <li>
                        <strong>Estudiante:</strong> <?php echo $alumno2->nombre; ?> | 
                        <strong>Promedio:</strong> <?php echo $alumno2->calcularPromedio(); ?> | 
                        <strong>Estado:</strong> <?php echo $alumno2->obtenerEstado(); ?>
                    </li>
                </ul>
            </div>
        </section>

        <!-- SECCIÓN 5: CUESTIONARIO CON TU FORMULARIO ORIGINAL -->
        <section id="practica">
            <h2>Cuestionario de Programación Orientada a Objetos</h2>
            <p>Selecciona una respuesta para cada pregunta. Cada respuesta correcta vale <strong>2 puntos</strong>; al finalizar verás tu puntuación sobre 10.</p>

            <?php
            // PROCESAMIENTO DEL CUESTIONARIO
            $puntaje = 0;
            $enviado = isset($_POST['enviar']);
            $respuestasCorrectas = [
                'q1' => ['opcion' => 'a', 'texto' => 'Un paradigma de programación que organiza el código en torno a objetos y datos.'],
                'q2' => ['opcion' => 'b', 'texto' => 'Una plantilla o molde que define propiedades y métodos.'],
                'q3' => ['opcion' => 'a', 'texto' => 'Las características o datos que describen a un objeto.'],
                'q4' => ['opcion' => 'b', 'texto' => 'Al crear un objeto, para inicializar sus atributos.'],
                'q5' => ['opcion' => 'a', 'texto' => 'Encapsulamiento.'],
            ];

            if ($enviado) {
                foreach ($respuestasCorrectas as $pregunta => $respuestaCorrecta) {
                    if (
                        isset($_POST[$pregunta])
                        && is_string($_POST[$pregunta])
                        && $_POST[$pregunta] === $respuestaCorrecta['opcion']
                    ) {
                        $puntaje += 2;
                    }
                }
            }
            ?>

            <div class="form-container">
                <form action="#practica" method="POST" class="quiz-container">
                    
                    <fieldset class="pregunta-bloque">
                        <legend>1. ¿Qué es la Programación Orientada a Objetos (POO)?</legend>
                        <label><input type="radio" name="q1" value="a" required> a) Un paradigma de programación que organiza el código en torno a objetos y datos.</label>
                        <label><input type="radio" name="q1" value="b"> b) Un lenguaje de marcado utilizado exclusivamente para estructurar páginas web.</label>
                        <label><input type="radio" name="q1" value="c"> c) Una base de datos relacional para almacenar información del usuario.</label>
                        <label><input type="radio" name="q1" value="d"> d) Un método para escribir únicamente código secuencial o lineal.</label>
                    </fieldset>

                    <fieldset class="pregunta-bloque">
                        <legend>2. ¿Qué es una clase en PHP?</legend>
                        <label><input type="radio" name="q2" value="a" required> a) Un objeto específico con datos asignados en memoria.</label>
                        <label><input type="radio" name="q2" value="b"> b) Una plantilla o molde que define propiedades y métodos.</label>
                        <label><input type="radio" name="q2" value="c"> c) Un método para calcular valores numéricos.</label>
                        <label><input type="radio" name="q2" value="d"> d) Una instancia específica creada a partir de un objeto.</label>
                    </fieldset>

                    <fieldset class="pregunta-bloque">
                        <legend>3. ¿Qué representan los atributos de un objeto?</legend>
                        <label><input type="radio" name="q3" value="a" required> a) Las características o datos que lo describen.</label>
                        <label><input type="radio" name="q3" value="b"> b) Las acciones que realiza el objeto.</label>
                        <label><input type="radio" name="q3" value="c"> c) Las instrucciones para crear una página web.</label>
                        <label><input type="radio" name="q3" value="d"> d) Los errores del programa.</label>
                    </fieldset>

                    <fieldset class="pregunta-bloque">
                        <legend>4. ¿Cuándo se ejecuta el constructor __construct() en PHP?</legend>
                        <label><input type="radio" name="q4" value="a" required> a) Cada vez que se cierra el navegador.</label>
                        <label><input type="radio" name="q4" value="b"> b) Al crear un objeto, para inicializar sus atributos.</label>
                        <label><input type="radio" name="q4" value="c"> c) Solo cuando se elimina una clase.</label>
                        <label><input type="radio" name="q4" value="d"> d) Al final de cada archivo PHP.</label>
                    </fieldset>

                    <fieldset class="pregunta-bloque">
                        <legend>5. ¿Qué pilar de la POO protege los datos restringiendo el acceso directo?</legend>
                        <label><input type="radio" name="q5" value="a" required> a) Encapsulamiento.</label>
                        <label><input type="radio" name="q5" value="b"> b) Herencia.</label>
                        <label><input type="radio" name="q5" value="c"> c) Polimorfismo.</label>
                        <label><input type="radio" name="q5" value="d"> d) Abstracción.</label>
                    </fieldset>

                    <button type="submit" name="enviar" value="1">Finalizar cuestionario</button>
                </form>

                <?php if ($enviado): ?>
                    <div class="resultado-cuestionario" role="status" aria-live="polite">
                        <h3>Tu puntuación: <?php echo $puntaje; ?>/10 puntos</h3>
                        <?php foreach ($respuestasCorrectas as $pregunta => $respuestaCorrecta): ?>
                            <?php
                            $respuestaUsuario = isset($_POST[$pregunta]) && is_string($_POST[$pregunta])
                                ? $_POST[$pregunta]
                                : '';
                            $esCorrecta = $respuestaUsuario === $respuestaCorrecta['opcion'];
                            ?>
                            <p class="<?php echo $esCorrecta ? 'respuesta-correcta' : 'respuesta-incorrecta'; ?>">
                                Pregunta <?php echo substr($pregunta, 1); ?>:
                                <strong><?php echo $esCorrecta ? 'Correcta' : 'Incorrecta'; ?>.</strong>
                                <?php if (!$esCorrecta): ?>
                                    Respuesta correcta: <?php echo htmlspecialchars($respuestaCorrecta['texto'], ENT_QUOTES, 'UTF-8'); ?>
                                <?php endif; ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <h3>Proyecto de POO en PHP - Equipo 1</h3>
        <p>Unidad Educativa Fiscomisional "María Auxiliadora"</p>
    </footer>
</body>
</html>