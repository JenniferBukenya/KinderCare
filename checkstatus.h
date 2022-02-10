void checkStatus(){

    char querry[200];
    char avgtime[200];
    char avgscore[200];

    strcpy(querry, "SELECT * FROM scores WHERE user_code = \'");
    strcat(querry, UserCode);
    strcat(querry, "\'");


    mysql_query(conn, querry);

    res = mysql_use_result(conn);

    printf("\t\t\t===========================================================================\n");
    printf("\t\t\t|    ASSIGNMENT ID    |      SCORE      |    COMMENT                       |\n");
    printf("\t\t\t============================================================================\n");
    while((row = mysql_fetch_row(res)) != NULL){

        printf("\t\t\t|\t\t%s\t\t%s%%\t\t  %s                    \n", row[1], row[4], row[5]);
    }
    printf("\t\t\t============================================================================\n");


    //This portion of code gets us the number of assignments attempted by a pupil via their usercode
    char attempts[250];
    strcpy(attempts, "SELECT * FROM scores where user_code = \'");
    strcat(attempts, UserCode);
    strcat(attempts, "\'");

    mysql_query(conn, attempts);
    res = mysql_store_result(conn);
    int counted = mysql_num_rows(res);
    //row = mysql_fetch_row(res);
    printf("\n\n");
    printf("\t\t\tNUMBER OF ASSIGNMENTS ATTEMPTED: %d\n", counted);


    //QUERY FOR NUMBER OF ASSIGNMENTS MISSED
char expired[1000];
strcpy(expired,"SELECT AssignmentID from assignments where status=\'EXPIRED\' AND AssignmentID NOT IN(SELECT AssignmentID from scores where user_code =\'");
   strcat(expired,UserCode);
   strcat(expired,"\')");
   mysql_query(conn,expired);
   res = mysql_store_result(conn);
   float missed = mysql_num_rows(res);


    printf("\n\t\t\tNUMBER OF ASSIGNMENTS MISSED: %.2f\n", missed);
     mysql_free_result(res);
   // number of all assignments
    mysql_query(conn, "SELECT * FROM assignments");
    res = mysql_store_result(conn);
    float numzy = mysql_num_rows(res);

printf("\n\t\t\tTOTAL NUMBER OF POSTED ASSIGNMENTS : %.2f\n", numzy);
    //PERCENTAGE OF ASSIGNMENTS MISSED
    float divide = (missed/numzy);

   float percentmissed = divide*100;

    printf("\n\t\t\tPERCENTAGE MISSED: %.2f%%\n", percentmissed);


        //QUERY FOR THE AVERAGE SCORE
          strcpy(avgscore, "SELECT * FROM scores WHERE user_code = \'");
          strcat(avgscore, UserCode);
          strcat(avgscore, "\'");
              // printf("\n Query:%s",avgscore);
           mysql_query(conn, avgscore);

    //res = mysql_use_result(conn);
    res = mysql_store_result(conn);

   // res = mysql_num_fields(conn);
    int av = mysql_num_rows(res);
    //row = mysql_fetch_row(res);
   // printf("\n Average:%d",);
   int z;
   float tot = 0.0;
   float average;
   while((row=mysql_fetch_row(res))!= NULL){
    tot += atof(row[4]);
   }

   //}
   average = tot/av;
   printf("\n");
   printf("\t\t\tAVERAGE SCORE: %.2f%%\n",average);

viewCommands();


}
