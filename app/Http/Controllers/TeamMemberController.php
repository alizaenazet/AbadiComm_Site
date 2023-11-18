<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function showTeamList(){
        return view("components.pages.admin.team-list")
        ->with('division', Division::all()->sortByDesc('updated_at'))
        ->with('members', TeamMember::all()->sortByDesc('updated_at'));
    }

    public function create(Request $request){   
         $request->validate([
            'name'=> 'required',
            'division' => 'required',
            'qualification' => 'required',
            'fileImage'=> 'required'
         ]);

         Validator::validate($request->all(),[
            'fileImage' => [
                File::image()
                    ->max('25mb')
            ]
        ]);

        $file = $request->file('fileImage');
        $ImageUrl = '/storage/'. $file->storePublicly('team_member', 'public');

        $division = Division::find($request['division']);
        $newTeamMember = $division->teamMembers()->create([
            'name' => $request['name'],
            'image_url' => $ImageUrl,
            'qualification' => $request['qualification']
        ]);
        if (is_object($newTeamMember) ) {
            return redirect('/dashboard/team-members')->with("teamMemberStatus","member berhasil ditambahkan"); 
        }
        return redirect('/dashboard/team-members')->with("teamMemberStatus","member gagal ditambahkan"); 
    }

    public function delete(TeamMember $teamMember){
        $imagePath = str_replace("/storage/",'',$teamMember->image_url);
        Storage::disk('public')->delete($imagePath);
        $teamMember->delete();
        return redirect('/dashboard/team-members')->with("teamMemberStatus","member berhasil dihapus"); 
    }

    public function update(TeamMember $teamMember, Request $request){
        $updatedField = array();
        if (is_null($request['updated'])) {
            return back()->withErrors(['notUpdated'=>'tidak ada pembaruan']);
        }
        if (!str_contains($request['updated'],",")) {
            $updatedField = array($request['updated']);
        }else {
            $updatedField = explode(",",$request['updated']);
        };

        for ($i=0; $i < count($updatedField); $i++) {
            switch ($updatedField[$i]) {
                case 'division':
                    $request->validate([
                        'division' => 'required'
                    ]);
                    $teamMember->division_id = $request['division'];
                    break;
                
                case 'name':
                    $request->validate([
                        'name' => 'required'
                    ]);
                    $teamMember->name = $request['name'];
                    break;
                
                case 'qualification':
                    $request->validate([
                        'qualification' => 'required'
                    ]);
                    $teamMember->qualification = $request['qualification'];
                    break;
                
                case 'fileImage':
                    $request->validate([
                        'fileImage' => 'required'
                    ]);
                    Validator::validate($request->all(),[
                        'fileImage' => [
                            File::image()
                                ->max('25mb')
                        ]
                    ]);
                    $currentImageUrl = $teamMember->image_url;
                    $file = $request->file('fileImage');
                    $newImageUrl = '/storage/'. $file->storePublicly('team_member', 'public');
                    $teamMember->image_url = $newImageUrl;
                    $deletedImagePath = str_replace("/storage/",'',$currentImageUrl);
                    Storage::disk('public')->delete($deletedImagePath);
                    break;
                
            }
        }
        $teamMember->save();
        return redirect('/dashboard/team-members')->with("teamMemberStatus","member berhasil diperbarui"); 
    }
}
