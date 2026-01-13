<table>
    <tr>
        <td colspan="8" style="text-align:center; font-weight:bold; font-size:16px;">
            PERSONAL DATA SHEET
        </td>
    </tr>

    <tr>
        <td colspan="8" style="text-align:center;">
            (CS Form No. 212, Revised 2017)
        </td>
    </tr>
</table>

<br>

<table border="1">
    <tr style="background:#e5e7eb; font-weight:bold;">
        <td colspan="8">I. PERSONAL INFORMATION</td>
    </tr>

    <tr>
        <td>SURNAME</td>
        <td colspan="3">{{ strtoupper($info->surname) }}</td>

        <td>FIRST NAME</td>
        <td colspan="3">{{ strtoupper($info->first_name) }}</td>
    </tr>

    <tr>
        <td>MIDDLE NAME</td>
        <td colspan="3">{{ strtoupper($info->middle_name) }}</td>

        <td>NAME EXTENSION</td>
        <td colspan="3">{{ $info->name_extension }}</td>
    </tr>

    <tr>
        <td>DATE OF BIRTH</td>
        <td colspan="3">{{ $info->date_of_birth }}</td>

        <td>PLACE OF BIRTH</td>
        <td colspan="3">{{ strtoupper($info->place_of_birth) }}</td>
    </tr>
</table>


<br>

<table border="1">
    <tr style="background:#e5e7eb; font-weight:bold;">
        <td colspan="8">II. EDUCATIONAL BACKGROUND</td>
    </tr>

    <tr style="font-weight:bold; text-align:center;">
        <td>LEVEL</td>
        <td>NAME OF SCHOOL</td>
        <td>DEGREE</td>
        <td>FROM</td>
        <td>TO</td>
        <td>UNITS</td>
        <td>YEAR GRADUATED</td>
        <td>HONORS</td>
    </tr>

    @foreach($info->educationalBackgrounds as $edu)
    <tr>
        <td>{{ strtoupper($edu->level) }}</td>
        <td>{{ strtoupper($edu->school_name) }}</td>
        <td>{{ strtoupper($edu->degree) }}</td>
        <td>{{ $edu->from_year }}</td>
        <td>{{ $edu->to_year }}</td>
        <td>{{ $edu->units }}</td>
        <td>{{ $edu->year_graduated }}</td>
        <td>{{ strtoupper($edu->honors) }}</td>
    </tr>
    @endforeach
</table>

<br>

<table border="1">
    <tr style="background:#e5e7eb; font-weight:bold;">
        <td colspan="6">VII. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION</td>
    </tr>

    <tr style="font-weight:bold; text-align:center;">
        <td>NAME OF ORGANIZATION</td>
        <td>FROM</td>
        <td>TO</td>
        <td>HOURS</td>
        <td>POSITION</td>
    </tr>

    @foreach($info->voluntaryOrganizations as $vol)
    <tr>
        <td>{{ strtoupper($vol->organization_name) }}</td>
        <td>{{ $vol->from_date }}</td>
        <td>{{ $vol->to_date }}</td>
        <td>{{ $vol->hours }}</td>
        <td>{{ strtoupper($vol->position) }}</td>
    </tr>
    @endforeach
</table>

