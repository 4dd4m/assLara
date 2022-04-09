<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [];

        //[comment,categoryId]

        $terminology = [
            ["Method, Mathematics and Proper Terminology",5],
            ["The method/methodology has not been justified through presentation of potential alternatives and resulting justification of the selected method on a balanced and well reasoned basis.",5],
            ["The method/methodology is not well reported and there is insufficient detail and description; the reader should be able to follow the reasoning and development and there should be adequate explanation and illustration in relation to the approach adopted.",5],
            ["Important assumptions have not been addressed/stated.",5],
            ["Fundamental flaws in methodology have been noted.",5],
            ["Standard and well accepted approaches have not been adopted, without clear justification for avoiding these.",5],
            ["The presentation of mathematics has clear deficiencies e.g. errors are present; wrong symbols have been used, Greek letters are absent or incorrect, subscripts and/or superscripts are missing; equation layout is flawed.",5],
            ["Important equations/expressions have not been properly numbered in sequence.",5],
            ["Key steps are missing in the development of equations/expressions.",5],
            ["Excessive detail has been included in the development of equations/expressions.",5],
            ["Units or symbols are not consistent with appropriate conventions e.g. such as the SI system of units.",5],
            ["Abbreviations and/or acronyms do not follow normal conventions or have not been explicitly defined at the first mention.",5],
            ["Results and Analysis",5],
            ["Assumptions have not been clearly stated.",5],
            ["There should be some tabular presentation of results.",5],
            ["Graphs or graphical presentation have/has not been used as expected.",5],
            ["The analysis of the results is too trivial in nature and a more detailed analysis was necessary (e.g. no confidence limits have been indicated).",5],
            ["Too much has been read into the results and sweeping conclusions have been made, which are not fully justified.",5],
            ["Statistical analysis aspects are flawed, e.g. they are incorrect, incomplete or inappropriately applied.",5],
            ["There is insufficient discussion of results and it has been wrongly assumed that they speak for themselves.",5],
            ["Anomalies are present in results which have not been properly discussed or commented upon.",5],
            ["Presentation of results involves excessive repetition and an appendix should have been used for the bulk of the material, once the first example(s) had been shown.",5],
            ["Irrelevant material has been included, which does not serve to enhance the presentation of results and/or related analysis.",5]];

        $results = [
            ["Results and Analysis",6],
            ["Assumptions have not been clearly stated.",6],
            ["There should be some tabular presentation of results.",6],
            ["Graphs or graphical presentation have/has not been used as expected.",6],
            ["The analysis of the results is too trivial in nature and a more detailed analysis was necessary (e.g. no confidence limits have been indicated).",6],
            ["Too much has been read into the results and sweeping conclusions have been made, which are not fully justified.",6],
            ["Statistical analysis aspects are flawed, e.g. they are incorrect, incomplete or inappropriately applied.",6],
            ["There is insufficient discussion of results and it has been wrongly assumed that they speak for themselves.",6],
            ["Anomalies are present in results which have not been properly discussed or commented upon.",6],
            ["Presentation of results involves excessive repetition and an appendix should have been used for the bulk of the material, once the first example(s) had been shown.",6],
            ["Irrelevant material has been included, which does not serve to enhance the presentation of results and/or related analysis.",6]];
        //array_push($categories,$spelling);
        //array_push($categories,$structure);
        //array_push($categories,$abstracts);
        //array_push($categories,$introduction_material);
        array_push($categories,$terminology);
        array_push($categories,$results);
        //array_push($categories,$conclusions);
        //array_push($categories,$references);
        //array_push($categories,$reflection);
        //array_push($categories,$plagiarism);
        //array_push($categories,$appendix);

        //seeding the unapproved comments
        //if your table is different, just taylor it
        foreach($categories as $category){
            for($i = 0; $i < count($category); $i++){
                //change the table layout to fir yours
                DB::table('comments')->insert([
                    'comment'       => $category[$i][0],
                    'firstName'     => "Alan",
                    'lastName'      => "Webb",
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'structure_id'   => $category[$i][1],
                    'isApproved'    => 1,                               //0 - not approved - 1 - approved
                    'email'         => "leet@hackor.com",
                    'tone'          => 0,
                ]);
            }       
        }

    } //method
} //class
