<?php

namespace App\Exports;

use App\Candidature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CandidatureExport implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $candidatures=Candidature::all();
        $champs_ajout = Schema::getColumnListing('candidatures_ajout');
        $ajouts=DB::select("SELECT * FROM candidatures_ajout");
        for($i=0;$i<count($champs_ajout);$i++) {
            for($j=0;$j<count($candidatures);$j++) {
                if(count($champs_ajout)>1) {
                    if(isset($ajouts[$j]->{$champs_ajout[$i]})) {
                        $candidatures[$j]->{$champs_ajout[$i]}=$ajouts[$j]->{$champs_ajout[$i]};
                    }
                    else{
                        $candidatures[$j]->{$champs_ajout[$i]}="";
                    }
                }
                unset($candidatures[$j]->created_at);
                unset($candidatures[$j]->updated_at);
                unset($candidatures[$j]->blocked);
                unset($candidatures[$j]->demande_unblocked);
                unset($candidatures[$j]->message_unblocked);
                unset($candidatures[$j]->adresse_fixe);
                unset($candidatures[$j]->code_postal);
                unset($candidatures[$j]->ville);
                unset($candidatures[$j]->annee_entree);
                $langues=$candidatures[$j]->langue1;
                $candidatures[$j]->langue1=$langues;
                if($candidatures[$j]->langue2!=null) {
                    $langues=$langues.', '.$candidatures[$j]->langue2;
                }
                if($candidatures[$j]->langue3!=null) {
                    $langues=$langues.', '.$candidatures[$j]->langue3;
                }
                unset($candidatures[$j]->langue2);
                unset($candidatures[$j]->langue3);
                unset($candidatures[$j]->annee_langue1);
                unset($candidatures[$j]->annee_langue2);
                unset($candidatures[$j]->annee_langue3);
                unset($candidatures[$j]->tel_fixe);
                unset($candidatures[$j]->portable);
                if($candidatures[$j]->boursier==1) {
                    $candidatures[$j]->boursier='Oui';
                }
                else {
                    $candidatures[$j]->boursier='Non';
                }
                unset($candidatures[$j]->date_erasmus);
                unset($candidatures[$j]->destination_erasmus);
                if($candidatures[$j]->deja_parti_erasmus==1) {
                    $candidatures[$j]->deja_parti_erasmus='Oui';
                }
                else {
                    $candidatures[$j]->deja_parti_erasmus='Non';
                }
                unset($candidatures[$j]->signature);
                unset($candidatures[$j]->annee_toeic);
            }
        }
        $GLOBALS['candidatures']=$candidatures;
        return $candidatures;
    }
    public function styles(Worksheet $sheet){
        //colonnes de bases vont jusqu'à S
        $ajouts=Schema::getColumnListing('candidatures_ajout');
        $taille="S";
        switch(count($ajouts)-1) {
            case 0:
                $taille="S";
                break;
            case 1:
                $taille="T";
                break;
            case 2:
                $taille="U";
                break;
            case 3:
                $taille="V";
                break;
            case 4:
                $taille="W";
                break;
            case 5:
                $taille="X";
                break;
            case 6:
                $taille="Y";
                break;
            case 7:
                $taille="Z";
                break;
            default:
                $taille="S";
                break;
        }
        $sheet->getStyle('A1:'.$taille.'1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'wrapText' => true,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFE991',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
        for($i=2;$i<count($GLOBALS['candidatures'])+2;$i++) {
            $sheet->getStyle('A'.$i.':'.$taille.$i)->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
        }
        $sheet->getRowDimension('1')->setRowHeight(42);
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(12);
        $sheet->getColumnDimension('J')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(12);
        $sheet->getColumnDimension('O')->setWidth(12);
        $sheet->getColumnDimension('Q')->setWidth(12);
        $sheet->getColumnDimension('S')->setWidth(12);
    }

    public function headings(): array
    {
        $array= [
            'Email',
            'Nom',
            'Prenom',
            'Date de naissance',
            'Nationalité',
            'Boursier CROUS',
            'Région d\'origine',
            'Année actuelle',
            'Diplôme',
            'Parcours',
            'Langues étudiées',
            'Score Toeic',
            'Deja parti Erasmus',
            'Choix 1',
            'Semestre choix 1',
            'Choix 2',
            'Semestre choix 2',
            'Choix 3',
            'Semestre choix 3'
        ];
        $champs_ajout = Schema::getColumnListing('candidatures_ajout');
        foreach($champs_ajout as $champ){
            if($champ!='email'){
                array_push($array,str_replace('_',' ',$champ));
            }
        }
        return $array;
    }
}
