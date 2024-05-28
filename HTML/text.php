<?php while ($row = $result->fetch_assoc()): ?>
        <div class="all-questions-item">
            <div class="all-questions-box question-box-check-root-class-name">
                <div class="question-box-content">
                    <div class="question-box-question">
                        <div class="question-box-details">
                            <span class="question-box-date">
                                <span>
                                    <?php 
                                    // Formatowanie daty
                                    $formatted_date = date("d.m.Y", strtotime($row['Question_datetime']));
                                    echo htmlspecialchars($formatted_date); 
                                    ?>
                                </span>
                            </span>
                            <span class="question-box-user">
                                <span><?php echo htmlspecialchars($row['User_nickname']); ?></span>
                            </span>
                            <span class="question-box-subject">
                                <span><?php echo htmlspecialchars($row['Subject']); ?></span>
                            </span>
                        </div>
                        <p class="question-box-question-text">
                            <span><?php echo htmlspecialchars($row['Question_text']); ?></span>
                        </p>
                    </div>
                    <div class="question-box-check-answer read-more">
                        <span class="question-box-check-span">
                            <a href="question.php?id=<?php echo $row['Question_ID']; ?>" class="question-box-check-span">Sprawdź odpowiedzi</a>
                        </span>
                        <img src="../Images/Icons/arrow-black.svg" class="question-box-check-image"/>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>