<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Website;

class InvoiceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website, Invoice $invoice)
    {
        $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make()
            ->addItem('Abonnement "Blog" pendant 1 mois', 10.25, 2)
            ->number($invoice->id)
            ->tax(20)
            ->notes("En cas de problème sur votre facture n'hésitez pas a nous contacter.")
            ->business([
                'name' => 'ATOMSit',
                'id' => 'siret',
                'phone' => '06 40 51 46 91',
                'location' => '6 Avenue Archimede',
                'zip' => '02100',
                'city' => 'Saint-Quentin',
                'country' => 'France'
            ])
            ->customer([
                'name' => 'Èrik Campobadal Forés',
                'id' => '12345678A',
                'phone' => '+34 123 456 789',
                'location' => 'C / Unknown Street 1st',
                'zip' => '08241',
                'city' => 'Manresa',
                'country' => 'Spain',
            ])
            ->download('demo');
        return $invoice;
    }
}