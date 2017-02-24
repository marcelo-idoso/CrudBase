<?php

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CategoriaRepository extends EntityRepository {

    public function getId(array $filtro, array $coluna = null) {
        $where = "1=1 ";

        $colunas = "1";

        if (count($coluna)) {
            foreach ($coluna as $id => $value) {
                $colunas .= " , s.{$value}";
            }
        }

        if (count($filtro)) {
            foreach ($filtro as $id => $value) {
                $where .= " and s.{$id} = '{$value}'";
            }
        }
        $select = $this->createQueryBuilder('s');
        $select->select($colunas);
        $select->where($where);
        $select->getMaxResults(1);
        $return = $select->getQuery()->getResult();

        return $return[0];
    }

    public function listView() {
        $naoExibir = $this->listView1();
        $exibir = $this->listView2();
        
        if ($exibir == FALSE && $naoExibir != FALSE) {
            return $naoExibir;
        } elseif ($naoExibir == FALSE && $exibir != FALSE) {
            return $exibir;
        } elseif ($naoExibir != false && $exibir != False) {
            return array_merge($naoExibir, $exibir);
        } else {
            return FALSE;
        }
    }

    public function listView1($parent = 1) {
        $listView = $this->createQueryBuilder('s')
                ->where("s.exibir = '$parent'")
                ->orderBy('s.orderexibir', 'ASC')
                ->getQuery()
                ->getResult();
        $i = 0;
        if ($listView != NULL) {
            if (!empty($listView)) {
                foreach ($listView as $product) {
                    $nav[$i] = array(
                        'label' => $product->getNome(),
                        'route' => $product->getLink(),
                    );
                    if ($product->getExibir() == 1) {
                        $nav[$i] = $nav[$i];
                    }
                    $i++;
                }
            }
            return $nav;
        } else {
            return FALSE;
        }
    }

    public function listView2($parent = 2) {
        $listView = $this->createQueryBuilder('s')
                ->where("s.exibir = '$parent'")
                ->orderBy('s.orderexibir', 'ASC')
                ->orderBy('s.nome', 'ASC')
                ->getQuery()
                ->getResult();
        $i = 0;
        if ($listView != NULL) {

            if (!empty($listView)) {
                foreach ($listView as $product) {
                    $nav[$i] = array(
                        'label' => $product->getNome(),
                        'route' => 'categoria',
                        'id' => $product->getLink()
                    );
                    $i++;
                }
            }
            $final['categoria'] = array(
                'label' => 'Categoria',
                'uri' => '#',
                'pages' => $nav
            );
            return $final;
        } else {
            return FALSE;
        }
    }

    public function AllView() {
        $alllist = $this->findAll();

        return $alllist;
    }

}
