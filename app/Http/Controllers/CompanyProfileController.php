<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function welcome()
    {
        return view('company.profile.welcome-profile');
    }

    public function home()
    {
        return view('company.profile.home');
    }

    public function aboutUs()
    {
        return view('company.profile.about');
    }

    public function whoWeAre()
    {
        return view('company.profile.who_we_are');
    }

    public function valuesEthics()
    {
        return view('company.profile.values_ethics');
    }

    public function ourTeam()
    {
        // Define the team members' data
        $teamMembers = [
            (object)[ 'name' => 'John Doe', 'designation' => 'Lead Developer', 'years' => 5, 'certifications' => 'PHP, Laravel, AWS', 'image' => 'john_doe.jpg' ],
            (object)[ 'name' => 'Jane Smith', 'designation' => 'UI/UX Designer', 'years' => 3, 'certifications' => 'Figma, Sketch, Photoshop', 'image' => 'jane_smith.jpg' ],
            (object)[ 'name' => 'Michael Johnson', 'designation' => 'Project Manager', 'years' => 7, 'certifications' => 'PMP, Scrum Master', 'image' => 'michael_johnson.jpg' ],
            (object)[ 'name' => 'Emily Davis', 'designation' => 'Backend Developer', 'years' => 4, 'certifications' => 'Node.js, Python, Django', 'image' => 'emily_davis.jpg' ],
            (object)[ 'name' => 'Chris Brown', 'designation' => 'DevOps Engineer', 'years' => 6, 'certifications' => 'AWS, Docker, Kubernetes', 'image' => 'chris_brown.jpg' ],
            (object)[ 'name' => 'Sophia Lee', 'designation' => 'Frontend Developer', 'years' => 3, 'certifications' => 'React, Vue.js, CSS', 'image' => 'sophia_lee.jpg' ],
            (object)[ 'name' => 'David Wilson', 'designation' => 'QA Engineer', 'years' => 5, 'certifications' => 'ISTQB, Selenium', 'image' => 'david_wilson.jpg' ],
            (object)[ 'name' => 'Jessica Martinez', 'designation' => 'Business Analyst', 'years' => 6, 'certifications' => 'CBAP, Agile', 'image' => 'jessica_martinez.jpg' ],
            (object)[ 'name' => 'Daniel Anderson', 'designation' => 'Tech Support', 'years' => 2, 'certifications' => 'CompTIA A+, ITIL', 'image' => 'daniel_anderson.jpg' ],
            (object)[ 'name' => 'Hannah Garcia', 'designation' => 'Content Strategist', 'years' => 3, 'certifications' => 'SEO, Content Marketing', 'image' => 'hannah_garcia.jpg' ],
            (object)[ 'name' => 'Ryan Scott', 'designation' => 'Cloud Engineer', 'years' => 5, 'certifications' => 'AWS, Azure, GCP', 'image' => 'ryan_scott.jpg' ],
            (object)[ 'name' => 'Laura Rodriguez', 'designation' => 'Data Scientist', 'years' => 4, 'certifications' => 'Python, R, Machine Learning', 'image' => 'laura_rodriguez.jpg' ],
            (object)[ 'name' => 'Samuel Adams', 'designation' => 'Cybersecurity Specialist', 'years' => 6, 'certifications' => 'CISSP, CEH', 'image' => 'samuel_adams.jpg' ],
            (object)[ 'name' => 'Olivia Thompson', 'designation' => 'Digital Marketing Manager', 'years' => 5, 'certifications' => 'Google Analytics, HubSpot', 'image' => 'olivia_thompson.jpg' ],
        ];

        // Pass the team members data to the view
        return view('company.profile.our_team', compact('teamMembers'));
    }

    public function productServices()
    {
        return view('company.profile.product_services');
    }

    public function anythingAsServices()
    {
        return view('company.profile.anything_as_services');
    }

    public function webDesignDevelopment()
    {
        return view('company.profile.web_design_development');
    }

    public function applicationDevelopment()
    {
        return view('company.profile.application_development');
    }

    public function itMaintenanceSupport()
    {
        return view('company.profile.it_maintenance_support');
    }

    public function events()
    {
        return view('company.profile.events');
    }

    public function contactUs()
    {
        return view('company.profile.contact');
    }

    public function tos()
    {
        return view('company.profile.TOS');
    }

    public function privacyP()
    {
        return view('company.profile.privacy_policy');
    }

    public function education()
    {
        return view('company.profile.education_service');
    }

    public function submit(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'details' => 'nullable|string|max:1000',
        ]);

        // Store the data in the database
        ContactSubmission::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'details' => $request->input('details'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent!');
    }

}

