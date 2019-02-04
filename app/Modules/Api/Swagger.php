<?php
/**
 * @SWG\Swagger(
 *     basePath="/api/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Exam system API",
 *         description="This is the API for exam system",
 *     )
 * )
 */

/**
 * @SWG\Post(
 *      path="/login",
 *      tags={"Authentication"},
 *      summary="Login to system",
 *      description="Login to the system and get user token for using",
 *      @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="User credential",
 *         required=true,
 *         type="string",
 *         @SWG\Schema(
 *            @SWG\Property(property="email", type="string"),
 *            @SWG\Property(property="password", type="string"),
 *         ),
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       @SWG\Response(response=500, description="Internal Server Errors")
 *     )
 */

/**
 * @SWG\Get(
 *      path="/",
 *      tags={"Contest"},
 *      summary="Get list of contests",
 *      description="Returns list of contests",
 *      @SWG\Parameter(
 *         name="Token",
 *         in="header",
 *         description="User Token",
 *         required=true,
 *         type="string",
 *         @SWG\Schema(
 *            @SWG\Property(property="Token", type="string"),
 *         ),
 *       ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       @SWG\Response(response=500, description="Internal Server Errors")
 *     )
 */

/**
 * @SWG\Post(
 *      path="/logout",
 *      tags={"Authentication"},
 *      summary="Logout user",
 *      description="logout the user in the system",
 *      @SWG\Parameter(
 *         name="Token",
 *         in="header",
 *         description="User Token",
 *         required=true,
 *         type="string",
 *         @SWG\Schema(
 *            @SWG\Property(property="Token", type="string"),
 *         ),
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       @SWG\Response(response=500, description="Internal Server Errors")
 *     )
 */

/**
 * @SWG\Get(
 *      path="/contest/{id}",
 *      tags={"Contest"},
 *      summary="Get contest info ",
 *      description="Returns contest info",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Parameter(
 *          name="id",
 *          description="contest ID",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Parameter(
 *         name="Token",
 *         in="header",
 *         description="User Token",
 *         required=true,
 *         type="string",
 *         @SWG\Schema(
 *            @SWG\Property(property="Token", type="string"),
 *         ),
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       @SWG\Response(response=500, description="Internal Server Errors")
 *     )
 */

/**
 * @SWG\Post(
 *      path="/contest/{id}/submit",
 *      tags={"Contest"},
 *      summary="Submit contest",
 *      description="Submit the contest to system",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Parameter(
 *          name="id",
 *          description="contest ID",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Parameter(
 *         name="Token",
 *         in="header",
 *         description="User Token",
 *         required=true,
 *         type="string",
 *         @SWG\Schema(
 *            @SWG\Property(property="Token", type="string"),
 *         ),
 *       ),
 *      @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         required=true,
 *         type="array",
 *         @SWG\Property(
 *             property="data",
 *             type="array",
 *             @SWG\Items(
 *                type="object",
 *                @SWG\Property(property="question_id", type="integer"),
 *                 @SWG\Property(property="answer_id", type="integer"),
 *             ),
 *         ),
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       @SWG\Response(response=500, description="Internal Server Errors")
 *     )
 */