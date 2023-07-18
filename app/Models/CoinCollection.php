<?php


namespace App\Models;

class CoinCollection
{
    private array $collection;

    public function __construct(array $data)
    {
        $this->collection = [];
        $this->addToCollection($data);
    }

    public function addToCollection(array $data): void
    {
        foreach ($data as $item) {
            $this->collection[] = new Crypto(
                $item->id,
                $item->name,
                $item->symbol,
                $item->quote->EUR->price
            );
        }
    }

}
