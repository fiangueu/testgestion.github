<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(): View
    {
         $posts=Task::paginate(3);
         return view('Task.index',[
            'posts'=>$posts
         ]);
    }
    public function show($id):RedirectResponse | View{
        $post=Task::findOrFail($id);
        return view('Task.show',[
            'tache'=>$post
            ]);
    }
    public function save(CreateTaskRequest $request){
        $tache=Task::create($request->validated());
        return redirect()->route('dashboard.show',['id'=>$tache->id])->with("success","l'article a bien ete sauvegarder");
        dd($request->all());
    }
    public function new():RedirectResponse | View{
        return view('Task.new');
    }
    public function edit(Task $task):RedirectResponse | View{
        return view('Task.edit',[
            'task'=>$task
        ]);
    }
    public function update(CreateTaskRequest $request,Task $task){
        $tache=$task->update($request->validated());
        return redirect()->route('dashboard.show',['id'=>$task->id])->with("success","l'article a bien ete modifier");
        dd($request->all());
    }
    public function delete(Task $task){
        $tache=$task->delete();
        return redirect()->route('dashboard.show',['id'=>$task->id])->with("success","l'article a bien ete supprimer");
    }
 /*   public function exportTableToExcel($exclude_columns)
{
    // Récupérer les données du tableau HTML
    $html = '<table><tr><th>Colonne 1</th><th>Colonne 2</th><th>Colonne 3</th></tr><tr><td>Donnée 1</td><td>Donnée 2</td><td>Donnée 3</td></tr></table>';
    $dom = new \DOMDocument();
    $dom->loadHTML($html);
    $table = $dom->getElementsByTagName('table')->item(0);

    // Créer un objet de feuille de calcul
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Ajouter les données du tableau à la feuille de calcul
    $rowIndex = 1;
    foreach ($table->getElementsByTagName('tr') as $row) {
        $columnIndex = 1;
        foreach ($row->getElementsByTagName('td') as $cell) {
            $value = $cell->nodeValue;
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }

    // Supprimer les colonnes spécifiées
    foreach ($exclude_columns as $column) {
        $sheet->removeColumnByIndex($column);
    }

    // Générer le fichier Excel et le télécharger
    $writer = new Xlsx($spreadsheet);
    $filename = 'nom-du-fichier.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
}*/
}
