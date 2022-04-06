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
    public function run(){

        $categories = [];

        //[comment,categoryId]
        $spelling = [
            ["Spelling, Grammar and Writing Style",1],
            ["There are spelling mistakes that could be avoided by using a spell-checker (e.g. within WORD) or a dictionary. Professional presentation should aim to have minimal numbers of errors in this respect.",1],
            ["Sentence construction is faulty and the phrases or word groupings presented are not always formed into proper sentences.",1],
            ["Sentence length is a problem in that over-lengthy sentences are being used. Aim to have a maximum of 15-20 words per sentence.",1],
            ["Punctuation needs attention. The most common issues are: insufficient commas; failure to use the full stop; incorrect use of the apostrophe.",1],
            ["Mobile phone ‘text-syndrome’ is a problem. This means that the written work contains abbreviations (or lower case letters), which might be acceptable in a text messages but are not appropriate in formal reporting.",1],
            ["Grammatical errors are present within sentences and expressions.",1],
            ["There is a tendency to use inappropriate or incorrect words within sentences and phrases.",1],
            ["Paragraph structure is faulty, e.g. paragraphs are too short (staccato style) and only include 1-2 sentences; paragraphs are not properly divided with each one relating to a new theme; paragraphs are not properly formatted on the page; paragraphs are absent altogether.",1],
            ["Bullet points are used in excess, where there should be more prose within the written work submitted.",1],
            ["A first person style (i.e. using I, We You etc. ) has been used, where the expectation for the submission is the use of a third person style. Professional and statutory bodies tend to expect first person styles in formal reports.",1],
            ["There is evidence that insufficient proof reading has taken place, due to the number of typographical errors that can be readily identified.",1],
            ["Slang expressions, foul/vulgar language or inappropriate expressions have been used.",1],
            ["Discussion aspects are difficult to follow, as they are illogical, poorly expressed, badly sequenced or otherwise weakly reasoned.",1],
            ["Unreasonable assumptions are being made in respect of the reader e.g. acronyms are being used without a full explanation on the first rendering; terminology is being introduced without definition, explanation or appropriate referencing to clarify same; excessive use of jargon is spoiling the flow of the text.",1],
            ["Sections feature trivial or insufficient treatment of the related subject-matter, e.g. coverage is too short or too shallow in nature.",1],
            ["Sections are over-lengthy/verbose and material needs to be edited to make it more succinct.",1],
            ["Word count recommendations have not been complied with i.e. the length of the document is significantly too high or significantly too low. ",1] ];

        $structure = [
            ["Structure, Presentation and Layout",2],
            ["There is no title page or the included title page has errors or omissions.",2],
            ["The overall structure has weaknesses e.g. No table of contents; no proper page numbering linked to the contents; no use of header/footer options to include key details such as Registration Number on each page.",2],
            ["The structure has room for enhancement e.g. the use of numbered sections; the inclusion of key sections such as abstract, introduction, review material, method, results/findings, discussion, conclusions, scope for further work, reflections on related learning, references, appendix; the appropriate ordering of sections.",2],
            ["Figures are not numbered in sequence and/or do not have captions; figures are not formally referred to at least once, in each case.",2],
            ["Features such as Tables or Equations are not labelled and numbered in sequence and/or referred to from within text sections.",2],
            ["Figures, tables or equations are not positioned close to where they are first referred to. (Where an appendix has been used for figures, this comment should be applied to sample figures/illustrations which may be required in the main body of the text.)",2],
            ["The formatting of pages detracts from the professional appearance of the document e.g. Captions/figure numbers and related figures on different pages; Excessive gaps between text sections for no apparent reason; irregular arrangement of material which lacks a consistent style throughout sections and throughout the entire document.",2],
            ["Fonts are variable in size and/or style in ways that detract from the professional appearance of the work.",2],
            ["Figures are not fully legible and/or do not adequately justify their inclusion for reasons such as: poor quality; not ideal to illustrate the points for which they are intended; excessive or inadequate information content; lack of focus, notably for scanned figures; poor reproduction such as significant printer cartridge related flaws; scruffy/untidy illustrations for hand-drawn works; use of pencil instead of black (or appropriate coloured) ink.",2],
            ["The overall presentation of the submission detracts from the quality of the work e.g. dirty and/or crumpled paper; illegible features such as ‘rough and ready’ hand annotations; other obvious features which are not commensurate with a professional business-like presentation style.",2],
            ["Red pen has been used but this is generally reserved for marking purposes. Red should not be used in your work unless it has been permitted specifically for the coursework in question (e.g. red lines representing polysilicon wires in an electronic layout, where colour representation is standard).",2]];

        $abstracts = [
            ["Abstracts and Executive Summaries",3],
            ["No abstract has been included although one was expected/required.",3],
            ["No executive summary has been included although this was an expected/required feature.",3],
            ["The abstract is not of an appropriate length; It should typically be 350-250 words and should fit comfortably on a single side of A4.",3],
            ["The abstract is not properly constructed; There should be no repetition; The text should flow logically; The abstract should succinctly summarise the entire document including final outcomes and conclusions; Quantitative findings should also be summarised; Abstracts are best written when the other work has been completed; Refereed Journals provide good sources for exemplars.",3],
            ["The executive summary is not properly constructed; It should be 3-5 times the length of the abstract and should contain more detail, throughout, while avoiding repetition and peripheral detail; upon reading the abstract and executive summary, the reader should have a good grasp of the underlying topic(s)/themes, what has been achieved, the resulting conclusions, the important outcomes, the principal quantitative outcomes and the relevance of the work in a wider context.",3]];

        $introduction_material = [
            ["Introductory Material",4],
            ["There is little or no introductory material and there has been a tendency to dive into the ‘meat’ of the work without preparing the reader, by leading gradually into the subject-matter.",4],
            ["The scope of the introductory material is inadequate and there is insufficient review of relevant background information which underpins the work being reported; There should be adequate referencing within the introduction to demonstrate relevant wider reading in the relevant areas, cognate with the topic.",4],
            ["One or more major areas of relevance has been overlooked completely or given only trivial coverage within the introductory material.",4],
            ["Irrelevant or inappropriate material has been included in the introductory material.",4],
            ["The introductory material includes excessive coverage and/or detail in relation to aspects of background material, thereby taking up valuable reporting space required for later sections of the document (i.e. ‘too much book’ and not enough evidence of original work).",4]];

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

        $conclusions = [
            ["Conclusions and Scope for Future Work",7],
            ["Conclusions have not been made or the conclusions offered are incomplete in the light of what has gone before.",7],
            ["Conclusions are written as experiential statements, describing how the work went. Such statements are more appropriate for a ‘personal reflections’ section.",7],
            ["There has been a failure to bring together, in a succinct form, the main conclusions that might have been drawn from the prior work as reported.",7],
            ["Inappropriate conclusions have been drawn, that are not consistent with the results and analysis.",7],
            ["The conclusions are not stated clearly and explicitly.",7],
            ["Specific conclusions are not properly separated from other conclusions and there is a resulting tendency towards ‘muddled conclusions’.",7],
            ["Key quantitative conclusions have not been reported in this section",7],
            ["There is no forward-looking linkage to future work that could be undertaken, in the light of what has been accomplished.",7],
            ["While there is some linkage to future work, the full potential for this has not been sufficiently highlighted.",7],
            ["The included suggestions for further work are not logically linked to the conclusions or they are otherwise lacking in appropriate justification.",7]];

        $references = [
            ["Referencing, Citation and URL usage",8],
            ["No reference citation has been included.",8],
            ["There has been insufficient referencing.",8],
            ["The mix of reference material is out of balance e.g. excessive use of URL based references; little or no academic journal citation; insufficient textbook citation; inappropriate reference material for the work involved; insufficient technical citation such as BSI or IEC documents or other regulatory documents.",8],
            ["Expected referencing conventions have not been followed e.g. the Harvard system has not been used; embedded citations are incorrectly indicated or otherwise faulty, such as incomplete or wrongly mapped in the document.",8],
            ["Specific references in the respective list(s) have not included sufficient levels of detail.",8],
            ["One or more references have been ‘over-played’ in citation.",8],
            ["Important and relevant references have been overlooked or omitted.",8],
            ["The scope of the included references is not broad enough.",8]];

        $reflection = [
            ["Reflections",9],
            ["No reflections have been included where a reflections section or paragraph was expected/required",9],
            ["Reflections are presented in the form of a diary.",9],
            ["The reflections section is trivial in nature and adds little value to the document.",9],
            ["The reflections included are largely experiential in nature but do not focus sufficiently on the learning experience through the work and discoveries and aspects of enlightenment that have arisen along the way.",9],
            ["The reflections have been utilised for the wrong purpose e.g. conclusions have been presented under the heading of reflections; this section includes complaints arising from the related work and perceived load.",9]];

        $plagiarism = [
            ["Plagiarism- related concerns",10],
            ["Work has been reproduced from sources, verbatim, without citation and quotation marks.",10],
            ["Work has been reproduced in a ‘near-verbatim’ form with only trivial changes in wording and presentation and without proper citation/acknowledgement.",10],
            ["Substantial portions of the work are based around ‘cut and paste’ sections without sufficient discussion and analysis of the source material.",10],
            ["There is evidence of reference material usage without appropriate citation.",10],
            ["Cut and paste figures have not been duly cited and acknowledged.",10],
            ["Work from other student submissions appears to have been reproduced within this submission, without acknowledgement. ",10],
            ["The bulk of the submission appears to be drawn from one or more reference sources, without proper citation/acknowledgement.",10]];

        $appendix = [
            ["Appendix-related concerns",11],
            ["An appendix should have been included.",11],
            ["More use should have been made of the appendix, to de-clutter the document.",11],
            ["The appendix should be split into a number of appendices to reflect the different aspects within its overall contents.",11],
            ["The appendix is excessively large and requires rationalisation of the material included.",11],
            ["Vital material, meritorious of inclusion in the main document, has been relegated to the appendix.",11]];

        //these comments represented as approved comments
        $summary = [
["There are spelling mistakes that could be avoided by using a spell-checker (e.g. within WORD) or a dictionary. Professional presentation should aim to have minimal numbers of errors in this respect.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Sentence construction is faulty and the phrases or word groupings presented are not always formed into proper sentences.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Sentence length is a problem in that over-lengthy sentences are being used. Aim to have a maximum of 15-20 words per sentence.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Punctuation needs attention. The most common issues are: insufficient commas; failure to use the full stop; incorrect use of the apostrophe.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Mobile phone ‘text-syndrome’ is a problem. This means that the written work contains abbreviations (or lower case letters), which might be acceptable in a text messages but are not appropriate in formal reporting.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Grammatical errors are present within sentences and expressions.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["There is a tendency to use inappropriate or incorrect words within sentences and phrases.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Paragraph structure is faulty, e.g. paragraphs are too short (staccato style) and only include 1-2 sentences; paragraphs are not properly divided with each one relating to a new theme; paragraphs are not properly formatted on the page; paragraphs are absent altogether.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Bullet points are used in excess, where there should be more prose within the written work submitted.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["A first person style (i.e. using I, We You etc. ) has been used, where the expectation for the submission is the use of a third person style. Professional and statutory bodies tend to expect first person styles in formal reports.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["There is evidence that insufficient proof reading has taken place, due to the number of typographical errors that can be readily identified.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Slang expressions, foul/vulgar language or inappropriate expressions have been used.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Discussion aspects are difficult to follow, as they are illogical, poorly expressed, badly sequenced or otherwise weakly reasoned.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Unreasonable assumptions are being made in respect of the reader e.g. acronyms are being used without a full explanation on the first rendering; terminology is being introduced without definition, explanation or appropriate referencing to clarify same; excessive use of jargon is spoiling the flow of the text.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Sections feature trivial or insufficient treatment of the related subject-matter, e.g. coverage is too short or too shallow in nature.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Sections are over-lengthy/verbose and material needs to be edited to make it more succinct.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["Word count recommendations have not been complied with i.e. the length of the document is significantly too high or significantly too low. ","Alan","Webb","jac.webb@ulster.ac.uk","1","n",1],
["There is no title page or the included title page has errors or omissions.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["The overall structure has weaknesses e.g. No table of contents; no proper page numbering linked to the contents; no use of header/footer options to include key details such as Registration Number on each page.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["The structure has room for enhancement e.g. the use of numbered sections; the inclusion of key sections such as abstract, introduction, review material, method, results/findings, discussion, conclusions, scope for further work, reflections on related learning, references, appendix; the appropriate ordering of sections.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Figures are not numbered in sequence and/or do not have captions; figures are not formally referred to at least once, in each case.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Features such as Tables or Equations are not labelled and numbered in sequence and/or referred to from within text sections.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Figures, tables or equations are not positioned close to where they are first referred to. (Where an appendix has been used for figures, this comment should be applied to sample figures/illustrations which may be required in the main body of the text.)","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["The formatting of pages detracts from the professional appearance of the document e.g. Captions/figure numbers and related figures on different pages; Excessive gaps between text sections for no apparent reason; irregular arrangement of material which lacks a consistent style throughout sections and throughout the entire document.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Fonts are variable in size and/or style in ways that detract from the professional appearance of the work.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Figures are not fully legible and/or do not adequately justify their inclusion for reasons such as: poor quality; not ideal to illustrate the points for which they are intended; excessive or inadequate information content; lack of focus, notably for scanned figures; poor reproduction such as significant printer cartridge related flaws; scruffy/untidy illustrations for hand-drawn works; use of pencil instead of black (or appropriate coloured) ink.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["The overall presentation of the submission detracts from the quality of the work e.g. dirty and/or crumpled paper; illegible features such as ‘rough and ready’ hand annotations; other obvious features which are not commensurate with a professional business-like presentation style.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["Red pen has been used but this is generally reserved for marking purposes. Red should not be used in your work unless it has been permitted specifically for the coursework in question (e.g. red lines representing polysilicon wires in an electronic layout, where colour representation is standard).","Alan","Webb","jac.webb@ulster.ac.uk","1","n",2],
["No abstract has been included although one was expected/required.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",3],
["No executive summary has been included although this was an expected/required feature.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",3],
["The abstract is not of an appropriate length; It should typically be 150-250 words and should fit comfortably on a single side of A4.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",3],
["The abstract is not properly constructed; There should be no repetition; The text should flow logically; The abstract should succinctly summarise the entire document including final outcomes and conclusions; Quantitative findings should also be summarised; Abstracts are best written when the other work has been completed; Refereed Journals provide good sources for exemplars.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",3],
["The executive summary is not properly constructed; It should be 3-5 times the length of the abstract and should contain more detail, throughout, while avoiding repetition and peripheral detail; upon reading the abstract and executive summary, the reader should have a good grasp of the underlying topic(s)/themes, what has been achieved, the resulting conclusions, the important outcomes, the principal quantitative outcomes and the relevance of the work in a wider context.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",3],
["There is little or no introductory material and there has been a tendency to dive into the ‘meat’ of the work without preparing the reader, by leading gradually into the subject-matter.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",4],
["The scope of the introductory material is inadequate and there is insufficient review of relevant background information which underpins the work being reported; There should be adequate referencing within the introduction to demonstrate relevant wider reading in the relevant areas, cognate with the topic.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",4],
["One or more major areas of relevance has been overlooked completely or given only trivial coverage within the introductory material.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",4],
["Irrelevant or inappropriate material has been included in the introductory material.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",4],
["The introductory material includes excessive coverage and/or detail in relation to aspects of background material, thereby taking up valuable reporting space required for later sections of the document (i.e. ‘too much book’ and not enough evidence of original work).","Alan","Webb","jac.webb@ulster.ac.uk","1","n",4],
["The method/methodology has not been justified through presentation of potential alternatives and resulting justification of the selected method on a balanced and well reasoned basis.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["The method/methodology is not well reported and there is insufficient detail and description; the reader should be able to follow the reasoning and development and there should be adequate explanation and illustration in relation to the approach adopted.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Important assumptions have not been addressed/stated.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Fundamental flaws in methodology have been noted.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Standard and well accepted approaches have not been adopted, without clear justification for avoiding these.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["The presentation of mathematics has clear deficiencies e.g. errors are present; wrong symbols have been used, Greek letters are absent or incorrect, subscripts and/or superscripts are missing; equation layout is flawed.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Important equations/expressions have not been properly numbered in sequence.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Key steps are missing in the development of equations/expressions.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Excessive detail has been included in the development of equations/expressions.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Units or symbols are not consistent with appropriate conventions e.g. such as the SI system of units.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Abbreviations and/or acronyms do not follow normal conventions or have not been explicitly defined at the first mention.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",5],
["Assumptions have not been clearly stated.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["There should be some tabular presentation of results.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Graphs or graphical presentation have/has not been used as expected.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["The analysis of the results is too trivial in nature and a more detailed analysis was necessary (e.g. no confidence limits have been indicated).","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Too much has been read into the results and sweeping conclusions have been made, which are not fully justified.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Statistical analysis aspects are flawed, e.g. they are incorrect, incomplete or inappropriately applied.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["There is insufficient discussion of results and it has been wrongly assumed that they speak for themselves.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Anomalies are present in results which have not been properly discussed or commented upon.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Presentation of results involves excessive repetition and an appendix should have been used for the bulk of the material, once the first example(s) had been shown.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Irrelevant material has been included, which does not serve to enhance the presentation of results and/or related analysis.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",6],
["Conclusions have not been made or the conclusions offered are incomplete in the light of what has gone before.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["Conclusions are written as experiential statements, describing how the work went. Such statements are more appropriate for a ‘personal reflections’ section.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["There has been a failure to bring together, in a succinct form, the main conclusions that might have been drawn from the prior work as reported.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["Inappropriate conclusions have been drawn, that are not consistent with the results and analysis.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["The conclusions are not stated clearly and explicitly.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["Specific conclusions are not properly separated from other conclusions and there is a resulting tendency towards ‘muddled conclusions’.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["Key quantitative conclusions have not been reported in this section","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["There is no forward-looking linkage to future work that could be undertaken, in the light of what has been accomplished.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["While there is some linkage to future work, the full potential for this has not been sufficiently highlighted.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["The included suggestions for further work are not logically linked to the conclusions or they are otherwise lacking in appropriate justification.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",7],
["No reference citation has been included.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["There has been insufficient referencing.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["The mix of reference material is out of balance e.g. excessive use of URL based references; little or no academic journal citation; insufficient textbook citation; inappropriate reference material for the work involved; insufficient technical citation such as BSI or IEC documents or other regulatory documents.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["Expected referencing conventions have not been followed e.g. the Harvard system has not been used; embedded citations are incorrectly indicated or otherwise faulty, such as incomplete or wrongly mapped in the document.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["Specific references in the respective list(s) have not included sufficient levels of detail.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["One or more references have been ‘over-played’ in citation.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["Important and relevant references have been overlooked or omitted.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["The scope of the included references is not broad enough.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",8],
["No reflections have been included where a reflections section or paragraph was expected/required","Alan","Webb","jac.webb@ulster.ac.uk","1","n",9],
["Reflections are presented in the form of a diary.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",9],
["The reflections section is trivial in nature and adds little value to the document.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",9],
["The reflections included are largely experiential in nature but do not focus sufficiently on the learning experience through the work and discoveries and aspects of enlightenment that have arisen along the way.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",9],
["The reflections have been utilised for the wrong purpose e.g. conclusions have been presented under the heading of reflections; this section includes complaints arising from the related work and perceived load.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",9],
["Work has been reproduced from sources, verbatim, without citation and quotation marks.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["Work has been reproduced in a ‘near-verbatim’ form with only trivial changes in wording and presentation and without proper citation/acknowledgement.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["Substantial portions of the work are based around ‘cut and paste’ sections without sufficient discussion and analysis of the source material.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["There is evidence of reference material usage without appropriate citation.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["Cut and paste figures have not been duly cited and acknowledged.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["Work from other student submissions appears to have been reproduced within this submission, without acknowledgement. ","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["The bulk of the submission appears to be drawn from one or more reference sources, without proper citation/acknowledgement.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",10],
["An appendix should have been included.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",11],
["More use should have been made of the appendix, to de-clutter the document.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",11],
["The appendix should be split into a number of appendices to reflect the different aspects within its overall contents.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",11],
["The appendix is excessively large and requires rationalisation of the material included.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",11],
["Vital material, meritorious of inclusion in the main document, has been relegated to the appendix.","Alan","Webb","jac.webb@ulster.ac.uk","1","n",11]];


        //comment out the category you dont need
        array_push($categories,$spelling);
        array_push($categories,$structure);
        array_push($categories,$abstracts);
        array_push($categories,$introduction_material);
        array_push($categories,$terminology);
        array_push($categories,$results);
        array_push($categories,$conclusions);
        array_push($categories,$references);
        array_push($categories,$reflection);
        array_push($categories,$plagiarism);
        array_push($categories,$appendix);

        //seeding the unapproved comments
        //if your table is different, just taylor it
        foreach($categories as $category){
            for($i = 0; $i < count($category); $i++){
                //change the table layout to fir yours
                DB::table('comments')->insert([
                    'comment'       => $category[$i][0],
                    'firstName'     => Str::random(10),
                    'lastName'      => Str::random(10),
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'structureId'   => $category[$i][1],
                    'isApproved'    => 0,                               //0 - not approved - 1 - approved
                    'email'         => Str::random(5)."@email.com",
                    'tone'          => 0,
                ]);
            }       
        }

        //seeding the approved comments (found in the summary tab in *.xls)
        //if you need need this, just change it to true
        //if your table is different, just taylor it
        if(false){
            for($i = 0; $i < count($summary); $i++){
                //change the table layout to fir yours
                DB::table('comments')->insert([
                    'comment'       => $summary[$i][0],
                    'firstName'     => $summary[$i][1],
                    'lastName'      => $summary[$i][2],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'structureId'   => $summary[$i][6],
                    'isApproved'    => $summary[$i][4] == "1" ? 1 : 0,   //0 - not approved - 1 - approved
                    'email'         => $summary[$i][3],
                    'tone'          => $summary[$i][5] == "n" ? 0 : 1
                ]);
            }       
        }

    } //method
} //class
