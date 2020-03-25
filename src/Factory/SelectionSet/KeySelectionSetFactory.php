<?php
declare(strict_types=1);

namespace Helis\EnebaClient\Factory\SelectionSet;

use Helis\EnebaClient\Enum\SelectionSetFactoryProviderNameEnum;
use Helis\EnebaClient\Provider\SelectionSetFactoryProviderAwareInterface;
use Helis\EnebaClient\Provider\SelectionSetFactoryProviderAwareTrait;
use Helis\GraphqlQueryBuilder\SelectionSet\Field;
use Helis\GraphqlQueryBuilder\SelectionSet\SelectionSet;

class KeySelectionSetFactory implements SelectionSetFactoryInterface, SelectionSetFactoryProviderAwareInterface
{
    use SelectionSetFactoryProviderAwareTrait;

    public function get(): SelectionSet
    {
        return new SelectionSet([
            new Field('id'),
            new Field('value'),
            new Field('orderNumber'),
            new Field('state'),
            new Field('createdAt'),
            new Field('soldAt'),
            new Field('format'),
            new Field('filename'),
            new Field('reportReason'),
            new Field('deletable'),
            new Field('acquisitionPrice', $this->provider->get(SelectionSetFactoryProviderNameEnum::MONEY())->get()),
        ]);
    }
}
