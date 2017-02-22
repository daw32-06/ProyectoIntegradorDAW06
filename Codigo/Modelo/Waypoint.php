<?php
    /**
    * Clase Waypoint
    * Cada waypoint es un punto en el mapa indicado con longitud y latitud en el mapa, tambien cuenta con campos extra
    *
    *
    * @author Juan José Rubio Iglesias
    * Ultima revision: 22/02/2017
    * @property float $latitud Latitud
    * @property float $longitud longitud
    * @property time $tiempo Fecha y hora exacta del Waypoint
    * @property int $heartRateBPM Frecuencia cardiaca en ese momento
    * @property float $elevation Elevacion en ese punto
    * @property int $numSatelites Numero de satelites detectados
    * @property float $valocidad Velocidad que llevaba en ese momento
    * @property int $calorias Calorias quemadas
    **/
    class Waypoint {

        protected $latitud;
        protected $longitud;
        protected $tiempo;
        protected $heartRateBPM;
        protected $elevation;
        protected $numSatelites;
        protected $velocidad;
        protected $calorias;
        /**
        * Constructor del Waypoint
        * @param float $latitud Latitud
        * @param float $longitud longitud
        * @param time $tiempo Fecha y hora exacta del Waypoint
        * @param int $heartRateBPM Frecuencia cardiaca en ese momento
        * @param float $elevation Elevacion en ese punto
        * @param int $numSatelites Numero de satelites detectados
        * @param float $valocidad Velocidad que llevaba en ese momento
        * @param int $calorias Calorias quemadas
        **/
        function __construct($latitud, $longitud, $tiempo, $heartRateBPM, $elevation, $numSatelites, $velocidad, $calorias)
        {
            $this->latitud = $latitud;
            $this->longitud = $longitud;
            $this->tiempo = $tiempo;
            $this->heartRateBPM = $heartRateBPM;
            $this->elevation = $elevation;
            $this->numSatelites = $satelites;
            $this->velocidad = $velocidad;
            $this->calorias = $velocidad;
        }


        /**
         * Inserta el waypoint en la base de datos
         * @return boolean Indicando si se ha añadido correctamente
         */
        public static function insertarTrackpoint(){
            //Insertaria el trackpoint en la base de datos
            //$insertar = TrackpointPDO::insertarTrackpoint(????);

        }
    }
