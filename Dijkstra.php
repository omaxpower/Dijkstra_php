
 <?php
class Dijkstra 
{

    var $visitados = array();
    var $distancia = array();
    var $antnodo = array();
    var $ininodo =null;
    var $map = array();
    var $infidistancia = 0;
    var $Nnodos = 0;
    var $MejorCamino = 0;
    var $DimMatriz = 0;

    function Dijkstra(&$ourmap, $infidistancia) 
    {
        $this -> infidistancia = $infidistancia;
        $this -> map = &$ourmap;
        $this -> Nnodos = count($ourmap);
        $this -> MejorCamino = 0;
    }

    function findShortestPath($start,$to)
    {
        $this -> ininodo = $start;
        for ($i=0;$i<$this -> Nnodos;$i++) 
        {
            if ($i == $this -> ininodo) 
            {
                $this -> visitados[$i] = true;
                $this -> distancia[$i] = 0;
            } 
            else 
            {
                $this -> visitados[$i] = false;
                $this -> distancia[$i] = isset($this -> map[$this -> ininodo][$i])
                    ? $this -> map[$this -> ininodo][$i]
                    : $this -> infidistancia;
            }

            $this -> antnodo[$i] = $this -> ininodo;
    }
        
        $maxTries = $this -> Nnodos; //maximo de intentos
        $tries = 0;

        while (in_array(false,$this -> visitados,true) && $tries <= $maxTries) 
        {            
            $this -> MejorCamino = $this->findMejorCamino($this->distancia,array_keys($this -> visitados,false,true));
            
            if($to !== null && $this -> MejorCamino === $to) 
            {
                break;
            }

            $this -> updatedistanciaAndPrevious($this -> MejorCamino);            
            $this -> visitados[$this -> MejorCamino] = true;

            $tries++;
        }
    }

    function findMejorCamino($ourdistancia, $ourNodesLeft) 
    {
        $MejorCamino = $this -> infidistancia;
        $bestNode = 0;

        for ($i = 0,$m=count($ourNodesLeft); $i < $m; $i++) 
        {
            if($ourdistancia[$ourNodesLeft[$i]] < $MejorCamino) 
            {
                $MejorCamino = $ourdistancia[$ourNodesLeft[$i]];
                $bestNode = $ourNodesLeft[$i];
            }
        }

        return $bestNode;
    }

    function updatedistanciaAndPrevious($obp) 
    {        
        for ($i=0;$i<$this -> Nnodos;$i++) 
        {
            if((isset($this->map[$obp][$i]))

                &&    (!($this->map[$obp][$i] == $this->infidistancia) || ($this->map[$obp][$i] == 0 ))    
                &&    (($this->distancia[$obp] + $this->map[$obp][$i]) < $this -> distancia[$i])
            )   

            {
                    $this -> distancia[$i] = $this -> distancia[$obp] + $this -> map[$obp][$i];
                    $this -> antnodo[$i] = $obp;
            }
        }
    }

    function printmap(&$map) 
    {
        $placeholder = ' %' . strlen($this -> infidistancia) .'d';
        $foo = '';

        for($i=0,$im=count($map);$i<$im;$i++) 
        {
            for ($k=0,$m=$im;$k<$m;$k++) 
            {
                $foo.= sprintf($placeholder, isset($map[$i][$k]) ? $map[$i][$k] : $this -> infidistancia);
            }

            $foo.= "\n";
        }
        return $foo;
    }

    function getResults($to) 
    {
        $ourShortestPath = array();
        $foo = '';

        for ($i = 0; $i < $this -> Nnodos; $i++) 
        {
            if($to !== null && $to !== $i) 
            {
                continue;
            }

            $ourShortestPath[$i] = array();
            $endNode = null;
            $currNode = $i;
            $ourShortestPath[$i][] = $i;

            while ($endNode === null || $endNode != $this -> ininodo) 
            {
                $ourShortestPath[$i][] = $this -> antnodo[$currNode];
                $endNode = $this -> antnodo[$currNode];
                $currNode = $this -> antnodo[$currNode];
            }

            $ourShortestPath[$i] = array_reverse($ourShortestPath[$i]);

            if ($to === null || $to === $i) 
            {
                if($this -> distancia[$i] >= $this -> infidistancia) 
                {
                    $foo .= sprintf("No hay ruta de %d hacia %d. \n",$this -> ininodo,$i);
                } 
                else 
                {
                    $foo .= sprintf(' De %d => hacia  %d = %d (metros) <br> Destinos [%d]: Sigue la siguiente ruta a las clases. (%s).'."\n" ,
                            $this -> ininodo,$i,$this -> distancia[$i],
                            count($ourShortestPath[$i]),
                            implode('-',$ourShortestPath[$i]));
                }
           
            }
        }

        return $foo;
    }
}
