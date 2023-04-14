<?php

namespace App\utils;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ReferralRequestService
{

    public function pushReferral()
    {


        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ZmhpcnVzZXI6Y2hhbmdlLXBhc3N3b3Jk'
        ];
        $body = '{
                  "resourceType": "ServiceRequest",
                  "identifier": [
                    {
                      "system": "http://example.com/identifiers",
                      "value": "12345"
                    }
                  ],
                  //"instantiatesUri": ["http://example.com/protocols/protocol-1"],
                  "basedOn": [
                    {
                      "reference": "CarePlan/123"
                    }
                  ],
                  "status": "active",
                  "intent": "order",
                  "category": [
                    {
                      "coding": [
                        {
                          "system": "http://example.com/categories",
                          "code": "lab"
                        }
                      ],
                      "text": "Laboratory Test"
                    }
                  ],
                  "priority": "routine",
                  "code": {
                    "coding": [
                      {
                        "system": "http://example.com/procedures",
                        "code": "blood-test",
                        "display": "Blood Test"
                      }
                    ],
                    "text": "Blood Test"
                  },
                  "subject": {
                    "reference": "Patient/123"
                  },
                  "encounter": {
                    "reference": "Encounter/123"
                  },
                  "occurrenceDateTime": "2023-04-14T10:30:00+00:00",
                  "requester": {
                    "reference": "Practitioner/123"
                  },
                  "performer": [
                    {
                      "reference": "Practitioner/456"
                    }
                  ],
                  "reasonCode": [
                    {
                      "coding": [
                        {
                          "system": "http://example.com/reasons",
                          "code": "symptoms",
                          "display": "Symptoms"
                        }
                      ],
                      "text": "Patient is experiencing flu-like symptoms"
                    }
                  ],
                  "supportingInfo": [

                        {
                            "reference": "https://shr.go.ke/34567823H"
                            //"code": "34567823H",
                            //"text": "Medical history, lab results and clinical notes and triage"
                        },
                        {
                            "reference": "https://shr.go.ke/34567823H"
                           // "code": "34567823H",
                           // "text": "Medical history, lab results and clinical notes"
                        },
                        {
                            "reference": "https://shr.go.ke/34567823H"
                            //"code": "34567823H",
                            //"text": "Medical history, lab results and clinical notes"
                        },
                        {

                            "reference": "https://shr.go.ke/34567823H",
                            "display": "Care Plan for Patient",
                            "type": "CarePlan",
                            "identifier": {
                            "system": "http://example.com/identifiers",
                            "value": "12345"
                            }
                        }
                  ],
                  "note": [
                    {
                      "text": "Patient fasting for 12 hours prior to blood test"
                    }
                  ],
                  "patientInstruction": "Please arrive at the lab fasting for at least 12 hours before the appointment",
                  "relevantHistory": [
                    {
                      "reference": "Provenance/123"
                    }
                  ]
                  }';
        $request = new Request('POST', 'https://interoperabilitylab.uonbi.ac.ke/test/fhir-server/api/v4/ServiceRequest', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        echo $res->getBody();

    }

}
