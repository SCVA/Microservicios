TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER tgnota AFTER INSERT\n  ON usuario FOR EACH ROW BEGIN\n	IF NEW.`modulo02` <> \'X\' THEN\n		INSERT INTO `estudiante` (`id_usu`) VALUES\n			(NEW.`id_usu`);\n	END IF;\n  END'
sql_modes=524288
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='utf8mb4_general_ci'
created=160505709605
