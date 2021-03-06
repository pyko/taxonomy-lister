<?php

namespace Bolt\Extension\Pyko\TaxonomyLister;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{
   public function initialize() {
      $this->addTwigFunction('listtaxonomies', 'listTaxonomies');
   }

   public function getName()
   {
      return "TaxonomyLister";
   }

   function listTaxonomies($records, $taxonomy_slug = 'tags')
   {
      $result = [];
      $i = 0;
      foreach ( $records as $record ) {
         foreach ( array_values($record->taxonomy[$taxonomy_slug]) as $taxonomy ) {
            $result[$i] = $taxonomy;
            $i += 1;
         }
      }

      $result = array_unique($result);
      sort($result);
      return $result;
   }
}

